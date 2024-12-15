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
        return $this->belongsToMany(Facility::class, 'room_facilities', 'room_id', 'facility_id');
    }

    public function indekos() {
        return $this->belongsTo(Indekos::class);
    }

    // toRupiah
    public function toRupiah($amount = null)
    {
        $amount = $amount ?? $this->price; // Use model's price if no amount is passed
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }

    // get room image path
    public function getImagePath()
    {
        return asset('uploads/rooms/' . $this->image);
    }
}
