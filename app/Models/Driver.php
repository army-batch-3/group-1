<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Transportation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'row_3',
        'transportation_id',
        'employee_id'
    ];

    protected $table = 'tr_drivers';

    public function transportations()
    {
        return $this->belongsTo(Transportation::class,'transportation_id', 'id');
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class,'employee_id', 'id');
    }
}
