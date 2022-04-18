<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFacilities extends Model
{
    protected $table = 'room_facilities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type', 'name'
    ];
}
