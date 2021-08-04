<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function warehouses()
    {
        return $this->belongsTo(Warehouse::class,'warehouse_id', 'id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id', 'id');
    }
}
