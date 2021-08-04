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
        'status',
        'date_approved'
    ];

    protected $table = 'tr_requisition_requests';
}
