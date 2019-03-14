<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTicket extends Model
{
    protected $table = "status_ticket";
    protected $fillable = ['status', 'ticket_id'];
}
