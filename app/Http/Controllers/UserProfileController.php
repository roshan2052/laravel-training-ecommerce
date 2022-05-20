<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\TestRequest;
use App\Http\Requests\UpdateBasicInfoRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Test;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $data['row'] =  auth()->user()->userProfile;

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function updateBasicInfo(UpdateBasicInfoRequest $request){
        try{
            $request->request->add(['user_id' => auth()->user()->id]);

            $this->model->updateOrCreate([
                'user_id' => auth()->user()->id,
            ],
                $request->all()
            );

            session()->flash('success_message', $this->panel.' Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }

        return response()->json('ok');
    }

    public function updatePassword(UpdatePasswordRequest $request){

        $hashed_password = bcrypt($request['new_password']);
        auth()->user()->update(['password' => $hashed_password ]);

        session()->flash('success_message','Password Updated Successfully !');

        return response()->json('ok');
    }



}
