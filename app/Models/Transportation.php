<?php

namespace App\Models;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transportation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'vehicle_id',
        'plate_number'
    ];

    protected $table = 'rf_transportations';

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id', 'id');
    }
}
