<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends BackendBaseController
{
    private $model;
    protected $panel = 'Test';
    protected $base_route = 'test.';
    protected $view_path = 'backend.test.';

    public function __construct()
    {
        $this->model = new Test;
    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return view($this->__loadDataToView($this->view_path . 'index'),compact('data'));
    }

    public function create(){

        $data = [];

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function store(TestRequest $request){

        if ($request->hasFile('image_field')) {
            $image_name = $this->uploadImage($request);
            $request->request->add(['image' => $image_name]);
        }

        try{
            $this->model->create($request->all());
            session()->flash('success_message', $this->panel.' Inserted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }

        return redirect()->route($this->base_route.'index');
    }

    public function show($id){
        $data = [];

        $data['row'] =  $this->model->findorFail($id);

        return view($this->__loadDataToView($this->view_path . 'show'),compact('data'));
    }

    public function edit($id){
        $data = [];

        $data['row'] =  $this->model->findorFail($id);

        return view($this->__loadDataToView($this->view_path .'edit'),compact('data'));
    }

    public function update(TestRequest $request,$id){

        $data['row'] =  $this->model->findorFail($id);

        // Image Upload
        if ($request->hasFile('image_field')) {
            $image = $request->file('image_field');
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->move('images/test', $image_name);
            $request->request->add(['image' => $image_name]);
        }

        try{
            $data['row']->update($request->all());
            session()->flash('success_message',$this->panel.' Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }
        return redirect()->route($this->base_route.'index');
    }

    public function destroy($id){

        $data['row'] = $this->model->findorFail($id);

        try{
            $data['row']->delete();
            session()->flash('success_message','Data deleted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }
        return redirect()->route($this->base_route.'index');
    }

}
