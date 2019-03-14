<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
    protected $fillable = ['aduan_id', 'nomor_ticket'];

    public function aduan(){
        return $this->belongsTo('App\Aduan');
    }
}
