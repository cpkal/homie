<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIndekosRequest;
use App\Models\Facility;
use App\Models\Indekos;
use App\Models\Room;
use App\Models\RoomFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndekosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['indekos'] = Indekos::all();

        return view('admins.indekos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['room_types'] = \App\Models\RoomType::all();

        return view('admins.indekos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateIndekosRequest $request)
    {        
        // start transaction
        DB::beginTransaction();


        $indekos = new Indekos();
        $indekos->name = $request->name;
        $indekos->address = $request->address;
        $indekos->owner_name = $request->owner;
        $indekos->save();
        
        foreach ($request->room_name as $idx => $room_name) {
            $room = new Room();
            $room->name = $room_name;
            $room->price = $request->price[$idx];
            $room->room_total = $request->room[$idx];
            $room->room_available = $request->available[$idx];
            $room->description = $request->description[$idx];
            $room->room_type_id = $request->room_type_id[$idx];
            $room->indekos_id = $indekos->id;
            $room->save();

            foreach($request->facility as $idx  => $fac) {
                $facility = Facility::where('name', $fac)->first();

                $image = null;
                $imageName = null;
                if($request->file('image') != null) {
                    // move image to public
                    $image = $request->file('image')[$idx];
                    $imageName = $image->getClientOriginalName() . '-' . time() . '.' . $image->extension();
                    $image->move(public_path('/uploads/facilities'), $image->getClientOriginalName());
                }
                
                if(!$facility) {
                    $facility = new Facility();
                    $facility->name = $fac;
                    $facility->image = $imageName;
                    $facility->save();
                }

                $roomFacility = new RoomFacility();
                $roomFacility->room_id = $room->id;
                $roomFacility->facility_id = $facility->id;
                $roomFacility->save();

            }
        }

        // commit transaction
        DB::commit();

        return redirect('admin/indekos');
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
        $data['indekos'] = Indekos::find($id);
        $data['room_types'] = \App\Models\RoomType::all();
        $data['rooms'] = Room::where('indekos_id', $id)->get();
        // $data['facilities'] = \App\Models\Facility::all();
        return view('admins.indekos.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        // start transaction
        DB::beginTransaction();

        $indekos = Indekos::find($id);
        $indekos->name = $request->name;
        $indekos->address = $request->address;
        $indekos->owner_name = $request->owner;
        $indekos->save();
        
        foreach ($request->room_name as $idx => $room_name) {
            $room = Room::find($request->room_id[$idx]);
            $room->name = $room_name;
            $room->price = $request->price[$idx];
            $room->room_total = $request->room[$idx];
            $room->room_available = $request->available[$idx];
            $room->description = $request->description[$idx];
            $room->room_type_id = $request->room_type_id[$idx];
            $room->indekos_id = $indekos->id;
            $room->save();

            // $room->facilities()->detach();
            // foreach($request->facilities as $facility) {
            //     $room->facilities()->attach($facility);
            // }
        }

        // commit transaction
        DB::commit();

        return redirect('admin/indekos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $indekos = Indekos::find($id);
        
        //find room
        $rooms = Room::where('indekos_id', $id)->get();
        foreach ($rooms as $room) {
            $room->delete();
        }

        $indekos->delete();

        return redirect('admin/indekos');
    }
}
