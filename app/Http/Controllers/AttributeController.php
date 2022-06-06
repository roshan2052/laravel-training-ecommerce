<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributeController extends BackendBaseController
{
    private $model;
    protected $panel = 'Attribute';
    protected $base_route = 'attributes.';
    protected $view_path = 'backend.attribute.';
    protected $img_path = 'images/attribute/';

    public function __construct()
    {
        $this->model = new Attribute;
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

    public function store(AttributeRequest $request){

        try{
            $key = Str::slug($request['name'],'_');
            $request->request->add(['key' => $key]);
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

    public function update(AttributeRequest $request,$id){

        $data['row'] =  $this->model->findorFail($id);

        try{
            $key = Str::slug($request['name'],'_');
            $request->request->add(['key' => $key]);
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

    public function trash()
    {
        $data['rows'] = $this->model->onlyTrashed()->latest()->get();

        return view($this->__loadDataToView($this->view_path.'.trash'), compact('data'));
    }

    public function restore(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data['rows'] = $this->model->withTrashed()->find($id)->restore();
            DB::commit();

            return redirect()->route($this->base_route.'index')->with('success_message', $this->panel.' Restored Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route($this->base_route.'index')->with('error_message', $this->panel.' Restore Failed');
        }
    }

    public function forceDelete(Request $request, $id)
    {
        DB::beginTransaction();
        $data['row'] = $this->model->withTrashed()->find($id);
        try {
            $data['row']->forceDelete();
            DB::commit();

            return redirect()->route($this->base_route.'trash')->with('success_message', $this->panel.' Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route($this->base_route.'trash')->with('error_message', $this->panel.' Restore Failed');
        }
    }

}
