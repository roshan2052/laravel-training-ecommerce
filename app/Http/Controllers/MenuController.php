<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends BackendBaseController
{
    private $model;
    protected $panel = 'Menu';
    protected $base_route = 'menu.';
    protected $view_path = 'backend.menu.';

    public function __construct()
    {
        $this->model = new Menu;
    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return view($this->__loadDataToView($this->view_path . 'index'),compact('data'));
    }

    public function create(){

        $data = [];
        $data['parents'] = $this->model->whereNull('parent_id')->orderBy('rank')->pluck('title','id');

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function store(MenuRequest $request){
        // try{
            $request->request->add(['created_by' => auth()->user()->id]);
            $this->model->create($request->all());
            session()->flash('success_message', $this->panel.' Inserted Successfully');
        // }
        // catch(\Exception $e){
        //     session()->flash('error_message','Something went wrong!');
        // }

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

    public function update(MenuRequest $request,$id){

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
