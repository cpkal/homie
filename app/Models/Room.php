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

    public function roomFacilities() {
        return $this->belongsToMany(RoomFacility::class, 'room_facility', 'room_id', 'facility_id');
    }
}
