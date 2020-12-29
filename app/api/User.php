<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [];
    protected $guarded = [];
}
