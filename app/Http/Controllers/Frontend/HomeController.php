<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    protected $view_path = 'frontend.';

    public function index(){

        $data = [];

        $data['categories'] = Category::with('subCategories.products')
            ->active()
            ->has('subCategories.products')
            ->latest()
            ->get();

        return view($this->view_path . 'index',compact('data'));
    }

}
