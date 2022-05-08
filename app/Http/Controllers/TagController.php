<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends BackendBaseController
{
    private $model;
    protected $panel = 'Tag';
    protected $base_route = 'tags.';
    protected $view_path = 'backend.tag.';
    protected $img_path = 'images/tag/';

    public function __construct()
    {
        $this->model = new Tag;
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

    public function store(TagRequest $request){
        try{

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

    public function update(TagRequest $request,$id){

        $data['row'] =  $this->model->findorFail($id);

        try{

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

            $data['row']->delete();
            session()->flash('success_message',$this->panel.' Deleted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }
        return redirect()->route($this->base_route.'index');
    }

}
