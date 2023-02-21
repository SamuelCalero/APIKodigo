<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::where('availability', true)->get(); // Obtener los usuarios con correo electrónico de Gmail
        $reservation= $reservations->values()->all(); 
        return $reservation;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new Reservation(); 
        $reservation->Check_in = $request->Check_in;
        $reservation->Check_out = $request->Check_out;
        $reservation->Id_room = $request->Id_room;
        $reservation->Id_client = $request->Id_client;
        $reservation->Details = $request->Details;
        $reservation->Price = $request->Price;
        $reservation->save();
        if ($request->has('services')) {
            $servicesSelected = $request->input('services');
            $reservation->services()->attach($servicesSelected);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
       return $reservation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation ::findOrfail($request->id);
        $reservation->Check_in = $request->Check_in;
        $reservation->Check_out = $request->Check_out;
        $reservation->Id_room = $request->Id_room;
        $reservation->Id_client = $request->Id_client;
        $reservation->Details = $request->Details;
        $reservation->Price = $request->Price;
    
        $reservation->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation=Reservation::find($id);
        $reservation->availability=false;
        $reservation->save();
        return $reservation;
    }
}
