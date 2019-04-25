<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $table = "assign";
    protected $fillable = ['users_id', 'ticket_id'];

    public function assignedTicket(){
        return $this->belongsTo('App\Ticket', 'id');
    }

    public function assignedUser(){
        return $this->belongsTo('App\User', 'users_id');
    }
}
