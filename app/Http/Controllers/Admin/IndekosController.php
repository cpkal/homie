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
        // return $request->all();
        // start transaction
        DB::beginTransaction();


        $indekos = new Indekos();
        $indekos->name = $request->name;
        $indekos->address = $request->address;
        $indekos->owner_name = $request->owner;
        $indekos->save();
        
        foreach ($request->room_name as $idx => $room_name) {
            $roomImage = $request->file('room_image')[$idx];
            $imageName = null;
            
            if($roomImage != null) {
                // move image to public
                $imageName = $roomImage->getClientOriginalName() . '-' . time() . '.' . $roomImage->extension();
                $roomImage->move(public_path('/uploads/rooms'), $imageName);
            }

            $room = new Room();
            $room->name = $room_name;
            $room->image = $imageName;
            $room->price = $request->price[$idx];
            $room->room_total = $request->room[$idx];
            $room->room_available = $request->available[$idx];
            $room->description = $request->description[$idx];
            $room->room_type_id = $request->room_type_id[$idx];
            $room->indekos_id = $indekos->id;
            $room->save();

            foreach ($request->facility as $idxs => $fac) {
                foreach ($fac as $idx2 => $item) {
                    $facility = Facility::where('name', $item)->first();
                    $image = $request->file('image')[$idxs][$idx2] ?? null; // Get the file input
            
                    // Check if the image is valid and exists
                    if ($image && $image->isValid()) {
                        $imageName = $image->getClientOriginalName() . '-' . time() . '.' . $image->extension();
                        $image->move(public_path('/uploads/facilities'), $imageName);
                    } else {
                        $imageName = null; // Handle missing or invalid images
                    }
            
                    // Handle the facility object if not found
                    if (!$facility) {
                        $facility = new Facility();
                        $facility->name = $item;
                        $facility->image = $imageName;
                        $facility->save();
                    }
            
                    // Create room facility record
                    $roomFacility = new RoomFacility();
                    $roomFacility->room_id = $room->id;
                    $roomFacility->facility_id = $facility->id;
                    $roomFacility->save();
                }
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
        
        // get facilities belongs to each room
        // $data['facilities'] = [];
        // foreach ($data['rooms'] as $room) {
        //     $facilities = RoomFacility::where('room_id', $room->id)->get();
        //     $facilities = $facilities->map(function($item) {
        //         return Facility::find($item->facility_id);
        //     });
        //     $data['facilities'][$room->id] = $facilities;
        // }

        // return $data['facilities'];


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
            $roomImage = $request->file('room_image')[$idx] ?? null;
            $imageName = null;
            
            if($roomImage != null) {
                // move image to public
                $imageName = $roomImage->getClientOriginalName() . '-' . time() . '.' . $roomImage->extension();
                $roomImage->move(public_path('/uploads/rooms'), $imageName);
            }

            $room = Room::find($request->room_id[$idx]);
            $room->name = $room_name;
            $room->image = $imageName ?? $room->image;
            $room->price = $request->price[$idx];
            $room->room_total = $request->room[$idx];
            $room->room_available = $request->available[$idx];
            $room->description = $request->description[$idx];
            $room->room_type_id = $request->room_type_id[$idx];
            $room->indekos_id = $indekos->id;
            $room->save();

            foreach($request->facility as $idx  => $fac) {
                foreach($fac as $idx2 => $item) {
                    $facility = Facility::where('name', $item)->first();
                    $image = $request->image[$idx][$idx2] ?? null;
                    $imageName = null;
                    
                    if($image != null) {
                        // move image to public
                        $imageName = $image->getClientOriginalName() . '-' . time() . '.' . $image->extension();
                        $image->move(public_path('/uploads/facilities'), $imageName);
                    }
                    
                    if(!$facility) {
                        $facility = new Facility();
                        $facility->name = $item;
                        $facility->image = $imageName ?? $facility->image;
                        $facility->save();
                    }

                    $roomFacility = new RoomFacility();
                    $roomFacility->room_id = $room->id;
                    $roomFacility->facility_id = $facility->id;
                    $roomFacility->save();
                }

                

            }
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
            //remove room facility
            $roomFacilities = RoomFacility::where('room_id', $room->id)->get();
            foreach ($roomFacilities as $roomFacility) {
                $roomFacility->delete();
            }
            $room->delete();
        }

        $indekos->delete();

        return redirect('admin/indekos');
    }

    public function findRoomByIndekosId($indekos_id) {
        $rooms = Room::where('indekos_id', $indekos_id)->get();
        return response()->json($rooms);
    }
}
