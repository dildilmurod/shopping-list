<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    //
    protected $table = 'lists';

    public $primaryKey = 'id';

    public $timestamps = true;



    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function status(){
        return $this->hasOne('App\Status');
    }


}
