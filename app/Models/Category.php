<?php

namespace App\Models;

use App\Http\Traits\FilterDataTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BackendBase
{
    protected $fillable = ['name','slug','image','rank','short_description','long_description','status','created_by','updated_by'];

    use HasFactory;

    // public function setNameAttribute($value){
    //     return $this->name = strtolower($value);
    // }

}
