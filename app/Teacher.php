<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable  = ['name','phone_num','email','subject','address','image',];
}
