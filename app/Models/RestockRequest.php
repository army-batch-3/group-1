<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestockRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'requestor_id',
        'approver_id',
        'status',
        'date_approved'
    ];

    protected $table = 'tr_restock_requests';

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id' ,'id');
    }

    public function requestors()
    {
        return $this->belongsTo(Employee::class,'requestor_id', 'id');
    }

    public function approvers()
    {
        return $this->belongsTo(Employee::class,'approver_id', 'id');
    }
}
