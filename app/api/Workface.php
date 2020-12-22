<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class Workface extends Model
{
    protected $table = "workface";
    protected $primaryKey = "workId";
    public $timestamps = false;
    protected $fillable = [];
    protected $guarded = [];
}
