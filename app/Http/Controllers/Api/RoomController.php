<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::where('availability', true)->get(); // Obtener los usuarios con correo electrónico de Gmail
        $room= $rooms->values()->all(); 
        return $room;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $room = new Room;
        $room->number = $request->number;
        $room->type = $request->type;
        $room->description = $request->description;
        $room->cost = $request->cost;

        if($room !=null){
        $room->save();
        return $room;
        }else{
            return "Error";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        //
        $room = Room::findOrFail($id);
        $room->number = $request->number;
        $room->type = $request->type;
        $room->description = $request->description;
        $room->cost = $request->cost;
        $room->availability = $request->availability;

        $room->save();

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $room= Room::find($id);
        return $room;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $room= Room::find($id);
        $room->availability=false;
        $room->save();
        return $room;
    }
}
