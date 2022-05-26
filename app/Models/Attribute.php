<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends BackendBase
{

    protected $fillable = ['name','status','created_by','updated_by'];
    
    use HasFactory,SoftDeletes;

}
