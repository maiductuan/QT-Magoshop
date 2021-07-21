<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    protected $table = 'nhanvien';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','nv_name','role_id','nv_email','nv_phone','nv_sex','nv_salary','nv_cmnd','nv_password','nv_birthdate','nv_adress','created_at','created_update'	
    ];
}
