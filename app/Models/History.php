<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'check_in', 'check_out', 'room_total', 'name', 'email', 'phone_number', 'guest_name', 'room_type', 'status'
    ];
}
