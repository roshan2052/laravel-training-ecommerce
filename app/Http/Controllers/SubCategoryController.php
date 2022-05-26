<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends BackendBaseController
{
    private $model;
    protected $panel = 'Sub Category';
    protected $base_route = 'sub_category.';
    protected $view_path = 'backend.sub_category.';
    protected $img_path = 'images/sub_category/';

    public function __construct()
    {
        $this->model = new SubCategory;
    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->with(['category','createdBy'])->latest()->get();

        return view($this->__loadDataToView($this->view_path . 'index'),compact('data'));
    }

    public function create(){

        $data = [];

        $data['categories'] = Category::active()->pluck('name','id');

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function store(SubCategoryRequest $request){
        try{
            if ($request->hasFile('image_field')) {
                $image_name = $this->uploadImage($request);
                $request->request->add(['image' => $image_name]);
            }
            $request->request->add(['created_by' => auth()->user()->id]);
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
        $data['categories'] = Category::active()->pluck('name','id');

        return view($this->__loadDataToView($this->view_path .'edit'),compact('data'));
    }

    public function update(SubCategoryRequest $request,$id){

        $data['row'] =  $this->model->findorFail($id);

        try{
            // Image Upload
            if ($request->hasFile('image_field')) {
                $image_name = $this->uploadImage($request);
                $request->request->add(['image' => $image_name]);
            }
            $request->request->add(['updated_by' => auth()->user()->id]);
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
            $this->deleteImage($data['row']->image);
            $data['row']->delete();
            session()->flash('success_message',$this->panel.' Deleted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }
        return redirect()->route($this->base_route.'index');
    }

}
