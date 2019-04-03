<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="order";
    public function user(){
        return $this->hasOne('App\User','id','id_user');
    }
}
