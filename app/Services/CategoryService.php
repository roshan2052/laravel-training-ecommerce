<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class CategoryService
{
    protected $model;
    protected $dataTables;

    public function __construct(Category $category, DataTables $dataTables)
    {
        $this->model = $category;
        $this->dataTables = $dataTables;
    }

    public function getDataForDataTable(Request $request)
    {
        return $this->dataTables::of($this->model->latest())
            ->editColumn('name', function($category){
                return ucfirst($category->name);
            })
            ->editColumn('slug', function($category){
                return $category->slug;
            })
            ->editColumn('image', function($category){
                return $category->image ? "<img src =".asset('images/category/'.$category->image)." class='img-fluid' width='100px' height='100px'>" : 'Image not found';
            })
            ->addColumn('action', function($category){
                $params = [
                    'edit'       => true,
                    'show'       => true,
                    'delete'     => true,
                    'base_route' => 'category.',
                    'id'         => $category->id,
                ];
                return view('backend.includes.datatable_action', compact('params'));
            })
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
    }

}
?>
