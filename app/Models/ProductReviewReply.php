<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReviewReply extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_review_id','product_id','user_id','comment'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productReview()
    {
        return $this->belongsTo(ProductReview::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
