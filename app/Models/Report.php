<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'userid',
        'roomid',
        'description',
        'specify',
        'status',
        'comment',
        'date_reported',
        'date_fixed',
        'month',
        'admin_read',
        'user_read'
    ];

    public function User() {
        return $this->hasOne(User::class, 'id', 'userid');
    }

    public function Room() {
        return $this->hasOne(Room::class, 'id', 'roomid');
    }
    public function Issue() {
        return $this->hasOne(Issue::class, 'id', 'description');
    }
}
