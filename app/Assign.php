<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    protected $table = "assign";
    protected $fillable = ['users_id', 'ticket_id'];
}
