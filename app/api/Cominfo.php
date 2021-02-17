<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class Cominfo extends Model
{
    //
    protected $table = "cominfo";
    protected $primaryKey = "workComId";
    public $timestamps = false;
    protected $fillable = [];
    protected $guarded = [];
}
