<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Indekos;
use Illuminate\Http\Request;

class IndekosController extends Controller
{
    public function index($id) {
        $data['indekos'] = Indekos::find($id);
        
        return view('users.indekos-detail', $data);
    }
}
