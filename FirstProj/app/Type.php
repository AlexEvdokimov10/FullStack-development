<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded=[];
    public function fish(){
        return $this->belongsTo(
            Fishs::class,'fish_id','id'
        );
    }
    public function fishs(){
        return $this->hasMany(
          Fishs::class,
          'type_id',
          'id'
        );
    }

}
