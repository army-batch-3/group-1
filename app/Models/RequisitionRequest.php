<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requestor_id',
        'approver_id',
        'transportation_id',
        'status',
        'date_approved'
    ];

    protected $table = 'tr_requisition_requests';

    public function requestors()
    {
        return $this->belongsTo(RequisitionItem::class,'requestor_id', 'id');
    }

    public function approvers()
    {
        return $this->belongsTo(Employee::class,'approver_id', 'id');
    }

    
}
