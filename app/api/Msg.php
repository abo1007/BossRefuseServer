<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    //
    protected $table = "msg";
    protected $primaryKey = "msgId";
    public $timestamps = false;
    protected $fillable = [];
    protected $guarded = [];
}
