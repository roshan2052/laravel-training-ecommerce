<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttributeDetail;
use App\Models\ProductImageDetail;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends BackendBaseController
{
    private $model;
    protected $panel = 'Product';
    protected $base_route = 'product.';
    protected $view_path = 'backend.product.';
    protected $img_path = 'images/product/';

    public function __construct()
    {
        $this->model = new Product();
    }

    public function index(){

        $data = [];

        $data['rows'] = $this->model->latest()->get();

        return view($this->__loadDataToView($this->view_path . 'index'),compact('data'));
    }

    public function create(){

        $data = [];
        $data['categories'] = Category::active()->pluck('name','id');
        $data['sub_categories'] = [];
        $data['attributes'] = Attribute::active()->pluck('name','id');
        $data['tags'] = Tag::active()->pluck('name','id');

        return view($this->__loadDataToView($this->view_path . 'create'),compact('data'));
    }

    public function store(ProductRequest $request){

        // try{

            DB::beginTransaction();

            $request->request->add(['created_by' => auth()->user()->id]);

            // to store product
            $product = $this->model->create($request->all());

            // to store tags
            $product->tags()->attach($request['tag_id']);

            // to store product attribute detail
            foreach($request['attribute_id'] as $index => $attribute_id){
                ProductAttributeDetail::create([
                    'product_id'        =>  $product->id,
                    'attribute_id'      => $attribute_id,
                    'value'             => $request['attribute_value'][$index]
                ]);
            }

            foreach($request['image_field'] as $index => $image){
                if ($request->hasFile('image_field')) {
                    $image_name = time().rand().'_'.$image->getClientOriginalName();
                    $image->move($this->img_path, $image_name);

                    //Image Resize
                    if($dimensions = config('image_dimension.product.image')){
                        foreach($dimensions as $dimension){
                            $image = Image::make($this->img_path. $image_name)->resize($dimension['width'], $dimension['height']);
                            $image->save($this->img_path.$dimension['width'].'_'.$dimension['height'].'_'. $image_name);
                        }
                    }

                    ProductImageDetail::create([
                        'product_id'    => $product->id,
                        'name'          => $request['image_name'][$index],
                        'image'         => $image_name,
                    ]);
                }
            }

            DB::commit();

            session()->flash('success_message', $this->panel.' Inserted Successfully');
        // }
        // catch(\Exception $e){
        //     DB::rollback();
        //     session()->flash('error_message',$e->getMessage());
        // }

        return response()->json('Data sucessfully inserted');
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
        $data['sub_categories'] = $data['row']->category->subCategories->pluck('name','id');
        $data['attributes'] = Attribute::active()->pluck('name','id');
        $data['tags'] = Tag::active()->pluck('name','id');

        return view($this->__loadDataToView($this->view_path .'edit'),compact('data'));
    }

    public function update(ProductRequest $request,$id){

        $data['row'] =  $this->model->findorFail($id);

        // try{
            DB::beginTransaction();

            $request->request->add(['updated_by' => auth()->user()->id]);

            $data['row']->update($request->all());

            $data['row']->tags()->sync($request['tag_id']);

            $data['row']->productAttributeDetails()
                ->whereNotIn('id',$request['product_attribute_detail_id'])
                ->delete();

            $product_attribute_details = ProductAttributeDetail::find($request['product_attribute_detail_id']);

            foreach($request['attribute_id'] as $index => $attribute_id){

                $product_attribute_detail = $product_attribute_details[$index] ?? false;

                if($product_attribute_detail){
                    $product_attribute_detail->update([
                        'value'             => $request['attribute_value'][$index],
                        'updated_by'        => auth()->user()->id
                    ]);
                }
                else{
                    ProductAttributeDetail::create([
                        'product_id'        => $data['row']->id,
                        'attribute_id'      => $attribute_id,
                        'value'             => $request['attribute_value'][$index]
                    ]);
                }
            }

            DB::commit();

            session()->flash('success_message',$this->panel.' Updated Successfully');
        // }
        // catch(\Exception $e){
        //     DB::rollback();
        //     session()->flash('error_message','Something went wrong!');
        // }
        return response()->json('Data Updated Successfully');
    }

    public function destroy($id){

        $data['row'] = $this->model->findorFail($id);

        try{
            DB::beginTransaction();
            $data['row']->tags()->detach();
            $data['row']->productAttributeDetails()->delete();
            $data['row']->productImageDetails()->delete();
            $data['row']->delete();
            DB::commit();
            session()->flash('success_message',$this->panel.' Deleted Successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            session()->flash('error_message','Something went wrong!');
        }
        return redirect()->route($this->base_route.'index');
    }

    public function getSubCategory()
    {
        return SubCategory::where('category_id', request('category_id'))->pluck('name', 'id');
    }

}
