<?php

namespace App\Models;

class Menu extends BackendBase
{
    protected $fillable = ['title','rank','route','parent_id','status','created_by','updated_by'];

    public function subMenus(){
        return $this->hasMany(Menu::class,'parent_id');
    }
}
