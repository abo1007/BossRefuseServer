<?php


namespace App\api;


class Activity extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "activity";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [];
    protected $guarded = [];
}
