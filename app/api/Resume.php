<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    //
    protected $table = "resume";
    protected $primaryKey = "candId";
    public $timestamps = false;
    protected $fillable = [];
    protected $guarded = [];
}
