<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

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
}
