<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'requisition_id',
        'asset_id',
        'quantity'
    ];

    protected $table = 'tr_requisition_items';

    public function assets()
    {
        return $this->belongsTo(Asset::class,'asset_id', 'id');
    }

    public function requisitions()
    {
        return $this->belongsTo(RequisitionRequest::class,'requisition_id', 'id');
    }
}
