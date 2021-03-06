<?php

namespace App\Models;

use App\Http\Traits\FilterDataTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends BackendBase
{
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

    public function productAttributeDetails(){
        return $this->hasMany(ProductAttributeDetail::class);
    }

    public function productImageDetails(){
        return $this->hasMany(ProductImageDetail::class);
    }

    public function latestImage(){
        return $this->hasOne(ProductImageDetail::class)->latest();
    }

    public function productReviews(){
        return $this->hasMany(ProductReview::class);
    }
}
