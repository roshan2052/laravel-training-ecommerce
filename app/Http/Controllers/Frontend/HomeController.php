<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    protected $view_path = 'frontend.';

    public function index(){

        $data = [];

        $query = Category::with(['subCategories' => function($sub_category){
            $sub_category->has('products')
                ->withCount('products');
            }])
            ->active()->has('subCategories')->latest();

        $data['categories'] =  clone($query)->get();

        $data['top_categories'] =  clone($query)->take(3)->get();

        return view($this->view_path . 'index',compact('data'));
    }

    public function productDetails($slug){

        $product = Product::where('slug',$slug)->first();

        return view($this->view_path . 'product_details',compact('product'));
    }

    public function storeReview(Request $request){
        $request->validate([
            'comment' => 'required',
        ]);

        $request->request->add(['user_id' => auth()->user()->id]);
        $product_review = ProductReview::create($request->all());

        $product_review_html = view('frontend.product.product_review',compact('product_review'))->render();

        return response()->json(['product_review_html' => $product_review_html]);

    }

    public function cart(){

        return view($this->view_path . 'product.cart');
    }

    public function addToCart(Request $request){

        // Check if product is alredy in cart
        $product_cart = auth()->user()->carts()
            ->where('product_id',$request['product_id'])
            ->first();
        if($product_cart){
            session()->flash('success_message','Product alredy exits in cart');
            return to_route('product.cart');
        }

        $product = Product::find($request['product_id']);
        Cart::create([
            'product_id'    => $request['product_id'],
            'price'         => $product->price,
            'quantity'      => $request['quantity'],
            'grand_total'   => $product->price * $request['quantity'],
            'user_id'       => auth()->id(),
        ]);

        return to_route('product.cart');
    }

    public function deleteCart(){

        $cart = Cart::where('user_id',auth()->id())
            ->where('product_id',request('product_id'))
            ->first();

        $cart->delete();

        $grand_total = auth()->user()->carts()->sum('grand_total');

        return response()->json(['grand_total' => $grand_total]);
    }

    public function updateCart(){

        $cart = Cart::where('user_id',auth()->id())
            ->where('product_id',request('product_id'))
            ->first();

        $grand_total =  $cart->product->price * request('quantity');

        $cart->update(['quantity' => request('quantity')]);

        $cart->update(['grand_total' => $grand_total]);

        $sub_total = auth()->user()->carts()->sum('grand_total');

        return response()->json(['grand_total' => $sub_total]);
    }

    public function applyCoupon(Request $request){
        $request->validate([
            'code' => 'required',
        ],[
            'code.required' => 'Please enter coupon code'
        ]);

        $coupon = Coupon::query()
            ->where('start_date','<=', now())
            ->where('expire_date','>', now())
            ->where('code',request('code'))
            ->first();

        if($coupon){
            // Check if user has already applied coupon code
            $user_has_coupon = auth()->user()->where('coupon_id',$coupon->id)->first();
            if($user_has_coupon){
                throw ValidationException::withMessages([
                    "code" => "Coupon has been already applied",
                ]);
            }
            auth()->user()->update(['coupon_id' => $coupon->id]);
        } else {
            throw ValidationException::withMessages([
                "code" => "Sorry coupon is not valid !",
            ]);
        }
        session()->flash('success_message','Coupon has been applied');
        return response()->json(['url' => route('product.cart')]);
    }

    public function productBySubcategory(Request $request,$cat_slug,$subcat_slug){

        $data = [];

        $data['sort_by_price'] = [
            'price_asc'     => 'Sort By Price Low To High',
            'price_desc'    => 'Sort By Price High To Low',
            'newest'        => 'Sort By Newest',
            'oldest'        => 'Sort By Oldest',
        ];

        $sub_category = SubCategory::where('slug',$subcat_slug)->firstOrFail();

        $data['products'] = $sub_category->products();

        if($request['sort_by']){
            if($request['sort_by'] == 'price_asc'){
                $data['products'] =  $data['products']->orderBy('price','asc');
            }
            if($request['sort_by'] == 'price_desc'){
                $data['products'] =  $data['products']->orderBy('price','desc');
            }
            if($request['sort_by'] == 'newest'){
                $data['products'] =  $data['products']->latest();
            }
            if($request['sort_by'] == 'oldest'){
                $data['products'] =  $data['products']->oldest();
            }

        }

        $data['products'] =  $data['products']->paginate(4);

        if ($request->ajax()) {
            $html = '';
            foreach ($data['products'] as $product) {
                $html.= view('frontend.load_more_product',['product' => $product])->render();
            }
            return $html;
        }

        return view($this->view_path . 'product_by_subcategory',compact('data','sub_category'));
    }
    public function checkout(){

        // Mail::to('abc@gmail.com')->queue(new OrderShipped($user));

        return view($this->view_path . 'checkout');
    }



}
