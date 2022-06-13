<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

    public function addToCart(){

        $data = [];
        return view($this->view_path . 'product.cart',compact('data'));

    }

}
