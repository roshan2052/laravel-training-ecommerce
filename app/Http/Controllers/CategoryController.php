<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\TestRequest;
use App\Models\Category;
use App\Models\Test;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends BackendBaseController
{
    private $model;
    protected $panel = 'Category';
    protected $base_route = 'category.';
    protected $view_path = 'backend.category.';
    protected $img_path = 'images/category/';

    public function __construct(CategoryService $categoryService)
    {
        $this->model            = new Category;
        $this->categoryService  = $categoryService;
    }

    public function index(){
        $data = [];

        return view($this->__loadDataToView($this->view_path . 'index'),compact('data'));
    }

    public function getCategoryDataForDataTable(Request $request)
    {
        return $this->categoryService->getDataForDataTable($request);
    }

    public function create(){

        $data = [];

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function store(CategoryRequest $request){
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

        return view($this->__loadDataToView($this->view_path .'edit'),compact('data'));
    }

    public function update(CategoryRequest $request,$id){

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

    public function export()
    {

        $data['row'] = Category::active()->get();

        return Excel::download(new CategoryExport($data), 'Category.xlsx');
    }

}
