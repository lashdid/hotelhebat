<?php

namespace App\Http\Controllers;

use App\Models\RoomFacilities;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::logout();
        $rooms = Rooms::all();
        $facilities = RoomFacilities::all();
        return view('room', compact('rooms', 'facilities'));
    }

    public function rooms(){
        $rooms = Rooms::all();
        return view('admin.rooms', compact('rooms'));
    }

    public function room_facilities(){
        $facilities = RoomFacilities::paginate(10);
        return view('admin.room-facilities', compact('facilities'));
    }

    public function room_facilities_create(){
        $form_type = "Tambah";
        $rooms = Rooms::all();
        return view('admin.form.room-facilities-form', compact('form_type', 'rooms'));
    }

    public function room_facilities_store(Request $request){
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
        ]);

        DB::table('room_facilities')->insert([
            'type' => $request->type,
            'name' => $request->name,
        ]);

        return redirect('/admin/room-facility');
    }

    public function room_facilities_edit(Request $request){
        $facility = RoomFacilities::where('id', $request->id)->first();
        $rooms = Rooms::all();
        $form_type = "Edit";
        return view('admin.form.room-facilities-form', compact('form_type', 'facility', 'rooms'));
    }

    public function room_facilities_update(Request $request){
        $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
        ]);
        
        $facility = RoomFacilities::where('id', $request->id)->first();

        $facility->type = $request->type;
        $facility->name = $request->name;

        $facility->save();

        return redirect('/admin/room-facility');
    }

    public function room_facilities_destroy(Request $request){
        $facility = RoomFacilities::where('id', $request->id)->first();

        $facility->delete();

        return redirect('/admin/room-facility');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_type = "Tambah";
        return view('admin.form.room-form', compact('form_type'));
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
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'type' => 'required|string',
            'amount' => 'required|numeric',
            'size' => 'required|numeric',
        ]);

        $image = $request->file('image');
        $image_name = time().'.'.$image->getClientOriginalName();
        $request->image->move(public_path('assets'), $image_name);

        DB::table('rooms')->insert([
            'type' => $request->type,
            'image' => $image_name,
            'amount' => $request->amount,
            'size' => $request->size,
        ]);

        return redirect('/admin/room');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $room = Rooms::where('id', $request->id)->first();
        return view('admin.form.room-detail', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $room = Rooms::where('id', $request->id)->first();
        $form_type = "Edit";
        return view('admin.form.room-form', compact('form_type', 'room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'amount' => 'required|numeric',
            'size' => 'required|numeric',
        ]);
        
        $room = Rooms::where('id', $request->id)->first();

        $room->type = $request->type;
        $room->amount = $request->amount;
        $room->size = $request->size;

        if ($request->image != '') {
            unlink(public_path('assets').'/'.$room->image);

            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('assets'), $image_name);

            $room->image = $image_name;
        }

        $room->save();

        return redirect('/admin/room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $room = Rooms::where('id', $request->id)->first();

        $room->delete();

        return redirect('/admin/room');
    }
}
