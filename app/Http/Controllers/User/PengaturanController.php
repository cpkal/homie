<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaturanController extends Controller
{
    public function index()
    {
        // get query string
        $query = request()->query('tab');

        if($query == 'history_order') {
            $data['history_orders'] = Booking::where('user_id', Auth::id())->get();
        } else if($query == 'history_transaction') {
            $data['history_transactions'] = Booking::where('user_id', Auth::id())->get();
        }
        
        return view('users.pengaturan', $data);
    }
}
