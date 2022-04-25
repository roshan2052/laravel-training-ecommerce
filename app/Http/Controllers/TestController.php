<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Test;
    }

    public function index(){

        $data = [];
        $data['rows'] = $this->model->latest()->get();

        return view('backend.test.index',compact('data'));
    }

    public function create(){

        $data = [];

        return view('backend.test.create',compact('data'));
    }

    public function store(TestRequest $request){

        try{
            $this->model->create($request->all());
            session()->flash('success_message','Data Inserted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }

        return redirect()->route('test.index');
    }

    public function show($id){
        $data = [];

        $data['row'] =  $this->model->findorFail($id);

        return view('backend.test.show',compact('data'));
    }

    public function edit($id){
        $data = [];

        $data['row'] =  $this->model->findorFail($id);

        return view('backend.test.edit',compact('data'));
    }

    public function update(TestRequest $request,$id){

        $data['row'] =  $this->model->findorFail($id);

        try{
            $data['row']->update($request->all());
            session()->flash('success_message','Data Updated Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong!');
        }
        return redirect()->route('test.index');
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
        return redirect()->route('test.index');
    }

}
