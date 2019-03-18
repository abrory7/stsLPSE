<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $table = "notif";
    protected $fillable = [
        'assign_id', 'notif_hd', 'notif_adsis', 'notif_adppe',
        'notif_verifikator', 'notif_pimpinan'
    ];

    public function Ticket(){
        return $this->belongsTo('App\Ticket');
    }
}
