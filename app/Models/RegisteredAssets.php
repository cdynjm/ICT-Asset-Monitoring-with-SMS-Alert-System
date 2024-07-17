<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredAssets extends Model
{
    use HasFactory;

    protected $table = 'registered_assets';

    protected $fillable = [
       'property',
       'model_number',
       'serial_number',
       'person_in_charge',
       'room',
       'status',
       'photo'
    ];

    public function Instructor() {
        return $this->hasOne(Instructor::class, 'id', 'person_in_charge');
    }
    public function Room() {
        return $this->hasOne(Room::class, 'id', 'room');
    }
}
