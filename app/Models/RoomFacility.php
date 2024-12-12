<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    protected $table = 'room_facilities';
    
    protected $fillable = ['name', 'icon'];

    public function rooms() {
        return $this->belongsToMany(Room::class, 'room_facility', 'facility_id', 'room_id');
    }
}
