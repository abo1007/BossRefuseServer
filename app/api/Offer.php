<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $table = "offer";
    protected $primaryKey = "workOfferId";
    public $timestamps = false;
    protected $fillable = [];
    protected $guarded = [];
}
