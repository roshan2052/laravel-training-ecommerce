<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BackendBase
{
    use HasFactory;
    protected $fillable =['category_id','sub_category_id','name','slug','code','short_description','description','price','quantity','stock','feature_key','flash_key','status','created_by','updated_by'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory(){
        return $this->belongsTo(Subcategory::class, 'sub_category_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
