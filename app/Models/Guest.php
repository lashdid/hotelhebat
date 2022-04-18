<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';
    protected $primaryKey = 'id';
    protected $fillable = [
        'check_in', 'check_out', 'room_total', 'name', 'email', 'phone_number', 'guest_name', 'room_type'
    ];
}
