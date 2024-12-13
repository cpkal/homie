<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Indekos;
use App\Models\Room;
use App\Models\RoomFacility;
use Illuminate\Http\Request;

class IndekosController extends Controller
{
    public function index($id) {
        $data['room'] = Room::find($id);
        $roomFacilities = RoomFacility::where('room_id', $id)->get();
        $data['facilities'] = [];
        foreach ($roomFacilities as $facility) {
            $data['facilities'][] = $facility->facility;
        }
        
        return view('users.indekos-detail', $data);
    }
}
