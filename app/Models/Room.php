<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'description', 'capacity', 'status'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'room_user', 'room_id', 'user_id');
    }

    public function roomType() {
        return $this->belongsTo(RoomType::class);
    }
}
