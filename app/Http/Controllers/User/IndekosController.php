<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Indekos;
use App\Models\Room;
use Illuminate\Http\Request;

class IndekosController extends Controller
{
    public function index($id) {
        $data['indekos'] = Indekos::find($id);

        $data['rooms'] = Room::where('indekos_id', $id)->get();
        
        return view('users.indekos-detail', $data);
    }
}
