<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSchedule extends Model
{
    use HasFactory;

    protected $table = 'room_schedule';

    protected $fillable = [
        'semester_id',
        'room_id',
        'instructor_id',
        'date_from',
        'date_to',
        'mon',
        'tue',
        'wed',
        'thu',
        'fri',
        'sat'
    ];

    public function Room() {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function Instructor() {
        return $this->hasOne(Instructor::class, 'id', 'instructor_id');
    }
}
