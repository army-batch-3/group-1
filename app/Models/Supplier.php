<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'contact_number',
        'contact_person',
        'address'
    ];

    protected $table = 'rf_suppliers';
}
