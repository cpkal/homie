<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Indekos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // get query params
        $query = request()->query();

        if(isset($query['search'])) {
            $data['indekos_with_rooms'] = Indekos::with('rooms')->where('name', 'like', '%'.$query['search'].'%')->get();
        } else {
            $data['indekos_with_rooms'] = Indekos::with('rooms')->get();
        }

        $data['recent_succeed_bookings'] = Booking::where('status', 'confirmed')->orderBy('created_at', 'desc')->limit(5)->get();

        return view('users.home', $data);
    }
}
