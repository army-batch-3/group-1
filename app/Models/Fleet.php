<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'type_of_request',
        'request_id',
        'status'
    ];

    protected $table = 'tr_fleets';
}
