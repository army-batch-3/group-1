<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestockRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'warehouse_id',
        'transportation_id',
        'requestor_id',
        'approver_id',
        'status',
        'date_approved'
    ];

    protected $table = 'tr_restock_requests';
}
