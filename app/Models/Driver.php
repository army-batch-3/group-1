<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'row_3',
        'transportation_id',
        'employee_id'
    ];

    protected $table = 'rf_drivers';
}
