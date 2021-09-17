<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestockItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'restock_id',
        'asset_id',
        'quantity'
    ];

    protected $table = 'tr_restock_items';

    public function assets()
    {
        return $this->belongsTo(Asset::class,'asset_id', 'id');
    }

    public function restocks()
    {
        return $this->belongsTo(RestockRequest::class,'restock_id', 'id');
    }
}
