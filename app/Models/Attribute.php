<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends BackendBase
{
    protected $fillable = ['name','status','created_by','updated_by'];
    
    use HasFactory;

}
