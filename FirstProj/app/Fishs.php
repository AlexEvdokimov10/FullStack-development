<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fishs extends Model
{
    protected $fillable=[
        'nameType','count','type_id'
    ];
    public function type(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
}
