<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'vehicle_id',
        'status',
        'plate_number'
    ];

    protected $table = 'rf_transportations';
}
