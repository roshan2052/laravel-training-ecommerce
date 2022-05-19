<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\TestRequest;
use App\Http\Requests\UpdateBasicInfoRequest;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Test;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends BackendBaseController
{
    private $model;
    protected $panel = 'User Profile';
    protected $base_route = 'user_profile.';
    protected $view_path = 'backend.user_profile.';
    protected $img_path = 'images/user_profile/';

    public function __construct()
    {
        $this->model = new UserProfile();
    }

    public function create(){

        $data = [];

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function updateBasicInfo(UpdateBasicInfoRequest $request){
        // try{
            if ($request->hasFile('image_field')) {
                $image_name = $this->uploadImage($request);
                $request->request->add(['logo' => $image_name]);
            }
            dd('basic_info');
            $request->request->add(['created_by' => auth()->user()->id]);
            $setting = $this->model->create($request->all());
            session()->flash('success_message', $this->panel.' Inserted Successfully');
        // }
        // catch(\Exception $e){
        //     session()->flash('error_message','Something went wrong!');
        // }

        return redirect()->route($this->base_route.'edit',$setting->id);
    }

    public function updatePassword(Request $request){
        // try{
            if ($request->hasFile('image_field')) {
                $image_name = $this->uploadImage($request);
                $request->request->add(['logo' => $image_name]);
            }
            dd('update_pass');
            $request->request->add(['created_by' => auth()->user()->id]);
            $setting = $this->model->create($request->all());
            session()->flash('success_message', $this->panel.' Inserted Successfully');
        // }
        // catch(\Exception $e){
        //     session()->flash('error_message','Something went wrong!');
        // }

        return redirect()->route($this->base_route.'edit',$setting->id);
    }



}
