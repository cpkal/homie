<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Indekos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['indekos_with_rooms'] = Indekos::with('rooms')->get();

        return view('users.home', $data);
    }
}
