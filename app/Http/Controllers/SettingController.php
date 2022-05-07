<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\TestRequest;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Test;
use Illuminate\Http\Request;

class SettingController extends BackendBaseController
{
    private $model;
    protected $panel = 'Setting';
    protected $base_route = 'setting.';
    protected $view_path = 'backend.setting.';
    protected $img_path = 'images/setting/';

    public function __construct()
    {
        $this->model = new Setting;
    }

    public function create(){

        $data = [];

        $setting = $this->model->first();

        if($setting){
            return redirect()->route($this->base_route.'edit',$setting->id);
        }

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function store(SettingRequest $request){
        // try{
            if ($request->hasFile('image_field')) {
                $image_name = $this->uploadImage($request);
                $request->request->add(['logo' => $image_name]);
            }
            $request->request->add(['created_by' => auth()->user()->id]);
            $setting = $this->model->create($request->all());
            session()->flash('success_message', $this->panel.' Inserted Successfully');
        // }
        // catch(\Exception $e){
        //     session()->flash('error_message','Something went wrong!');
        // }

        return redirect()->route($this->base_route.'edit',$setting->id);
    }


    public function edit($id){
        $data = [];

        $data['row'] =  $this->model->findorFail($id);

        return view($this->__loadDataToView($this->view_path .'edit'),compact('data'));
    }

    public function update(SettingRequest $request,$id){

        $data['row'] =  $this->model->findorFail($id);
        try{
            $request->request->add(['updated_by' => auth()->user()->id]);
            $data['row']->update($request->all());
            session()->flash('success_message',$this->panel.' Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }
        return back();
    }



}
