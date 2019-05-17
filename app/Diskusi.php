<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    protected $table = "diskusi";

    public function getTicket(){
        return $this->hasOne('App\Ticket', 'ticket_id');
    }
}
