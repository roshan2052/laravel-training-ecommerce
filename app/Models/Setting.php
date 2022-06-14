<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends BackendBase
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = ['name','address','email','phone','website','logo','fav_icon','facebook_link','twitter_link','youtube_link','instagram_link','google_map','shipping_type','value','created_by'];
}
