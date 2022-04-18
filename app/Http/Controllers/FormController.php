<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Auth::logout();

        $check_in = $request->check_in;
        $check_out = $request->check_out;
        $room_total = $request->room_total;
        $rooms = Rooms::all();

        if(date_create($request->check_out) < date_create($request->check_in)){
            $error = 'lower';
            return view('/form', compact('check_in', 'check_out', 'room_total', 'rooms', 'error'));
        }
        elseif(date_create($request->check_out) == date_create($request->check_in)){
            $error = 'same';
            return view('/form', compact('check_in', 'check_out', 'room_total', 'rooms', 'error'));
        }

        return view('form', compact('check_in', 'check_out', 'room_total', 'rooms'));
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
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'room_total' => 'required|numeric',
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'guest_name' => 'required',
            'room_type' => 'required',
        ]);

        if(date_create($request->check_out) < date_create($request->check_in)){
            return redirect('/form')->with('error', 'lower');
        }
        else if(date_create($request->check_out) == date_create($request->check_in)){
            return redirect('/form')->with('error', 'same');
        }

        $room = Rooms::where('type', $request->room_type)->first();

        if($room->amount < $request->room_total){
            return redirect('/form')->with('error', 'full');
        }
        else{
            $room->amount -= $request->room_total;
            $room->save();
        }
        
        DB::table('guest')->insert([
            'check_in' => date_format(date_create($request->check_in), "d/m/Y"),
            'check_out' => date_format(date_create($request->check_out), "d/m/Y"),
            'room_total' => $request->room_total,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'guest_name' => $request->guest_name,
            'room_type' => $request->room_type,
        ]);

        return redirect('/form')->with('id', DB::getPdo()->lastInsertId());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
