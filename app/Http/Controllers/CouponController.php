<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Http\Requests\TagRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends BackendBaseController
{
    private $model;
    protected $panel = 'Coupon';
    protected $base_route = 'coupon.';
    protected $view_path = 'backend.coupon.';

    public function __construct()
    {
        $this->model = new Coupon();
    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return view($this->__loadDataToView($this->view_path . 'index'),compact('data'));
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function create(){

        $data = [];

        $data['code'] = $this->generateRandomString(5).'-'.rand(10000,99999);

        $data['disabled_code'] = false;

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function store(CouponRequest $request){

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

        $data['disabled_code'] = true;

        return view($this->__loadDataToView($this->view_path .'edit'),compact('data'));
    }

    public function update(CouponRequest $request,$id){

        $data['row'] =  $this->model->findorFail($id);

        try{
            $request->request->add(['updated_by' => auth()->user()->id]);
            $data['row']->update($request->except('code'));
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
