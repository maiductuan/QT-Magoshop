<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = 'workshop';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','work_name','work_contents','created_at','created_update'	
    ];
}
