<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Indekos;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['bookings'] = Booking::all();
        return view('admins.booking.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['indekos'] = Indekos::all();
        $data['customers'] = User::all();
        return view('admins.booking.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $booking = new Booking();
        $booking->indekos_id = $request->indekos;
        $booking->room_id = $request->room;
        $booking->status = $request->status;
        $booking->user_id = $request->customer;
        $booking->booking_date = $request->booking_date;
        $booking->save();

        // decrease room available
        $room = Room::find($request->room);
        $room->room_available = $room->room_available - 1;
        $room->save();

        DB::commit();

        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        $booking = Booking::find($id);
        $booking->status = $request->status;
        $booking->save();

        if($request->status == 'cancel') {
            $room = Room::find($booking->room_id);
            $room->room_available = $room->room_available + 1;
            $room->save();
        }

        DB::commit();

        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect()->route('booking.index');
    }
}
