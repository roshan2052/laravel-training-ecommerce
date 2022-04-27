<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendBaseController extends Controller
{
    //function to load data to view file
    protected function __loadDataToView($viewPath){
        view()->composer($viewPath,function($view){
            $view->with('panel',$this->panel);
            $view->with('view_path',$this->view_path);
            $view->with('base_route',$this->base_route);
        });
        return $viewPath;
    }

    protected function uploadImage(Request $request){
        $image = $request->file('image_field');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image->move('images/test', $image_name);
        return $image_name;
    }




}
