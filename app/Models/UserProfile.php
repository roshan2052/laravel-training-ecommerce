<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends BackendBase
{
    protected $fillable = ['user_id','phone','address','dob','father_name','mother_name','facebook_link','insta_link','image','short_bio'];

    use HasFactory;

}
