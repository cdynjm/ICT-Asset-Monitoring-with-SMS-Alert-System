<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';

    protected $fillable = [
        'name',
        'position',
        'contact_number',
        'model_number',
        'serial_number',
        'property_name',
        'quantity',
        'person_in_charge',
        'date_borrowed',
        'date_returned',
        'asset_condition',
        'remarks',
        'status'
    ];
}
