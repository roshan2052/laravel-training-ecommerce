<?php

namespace App\Models;

class Coupon extends BackendBase
{
    protected $fillable = ['title','code','start_date','expire_date','discount_amount','status','created_by','updated_by'];
}
