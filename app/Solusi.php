<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    protected $table = "solusi";
    protected $fillable = ['users_id', 'solusi'];

    public function aduan(){
        return $this->belongsTo('App\Aduan');
    }
    public function users(){
        return $this->belongsTo('App\User');
    }
}
