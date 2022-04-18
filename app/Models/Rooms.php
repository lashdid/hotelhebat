<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type', 'image', 'amount', 'size'
    ];
}
