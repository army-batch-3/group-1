<?php

namespace App\Models;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function drivers()
    {
        return $this->belongsTo(Driver::class,'driver_id', 'id');
    }
}
