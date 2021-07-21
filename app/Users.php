<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','user_name','user_email','user_phone','user_adress','user_birthdate','created_at','created_update'	
    ];
}
