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

        $data['categories'] = Category::with(['subCategories' => function($sub_category){
                $sub_category->has('products')
                    ->withCount('products')
                    ->orderBy('products_count','desc');
            }])
            ->active()
            ->has('subCategories')
            ->latest()
            ->get();

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
        ProductReview::create($request->all());
        return back();

    }

}
