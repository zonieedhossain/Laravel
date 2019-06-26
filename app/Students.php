<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable  = ['name','phone_num','email','roll','reg_no', 'department_name','class_name','father_name','mother_name','address','guardian_num','image'];
}
