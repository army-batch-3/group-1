<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'number_of_stocks',
        'type',
        'supplier_id',
        'warehouse_id',
        'price'
    ];

    protected $table = 'rf_assets';
}
