<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefectiveAsset extends Model
{
    use HasFactory;

    protected $table = 'defective_asset';

    protected $fillable = [
        'report_id',
        'property_id',
        'others'
    ];

    public function RegisteredAssets() {
        return $this->hasOne(RegisteredAssets::class, 'id', 'property_id');
    }
}
