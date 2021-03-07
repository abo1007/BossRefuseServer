<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str;

class User extends Model
{
    //
    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [];
    protected $guarded = [];

    /**
     * 更新token
     * @return mixed|string
     */
    public function generateToken() {
        $this->api_token = Str::random(128);
        $this->save();

        return $this->api_token;
    }
}
