<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\History;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index(){
        $guests = Guest::all();
        return view('receptionist.index', compact('guests'));
    }

    public function search(Request $request){
        $name = $request->name;
        $guests = Guest::where('name', 'like', "%".$request->name."%")->get();
        return view('receptionist.index', compact('guests', 'name'));
    }

    public function order(Request $request){
        if ($request->order_by == 'desc') {
            $guests = DB::table('guest')->orderByDesc('check_in')->get();            
        }else{
            $guests = DB::table('guest')->orderBy('check_in')->get();
        }
        return view('receptionist.index', compact('guests'));
    }

    public function detail(Request $request){
        $guest = Guest::where('id', $request->id)->first();
        return view('receptionist.detail', compact('guest'));
    }

    public function history(){
        $guests = History::all();
        return view('receptionist.history', compact('guests'));
    }

    public function historyDetail(Request $request){
        $guest = History::where('id', $request->id)->first();
        return view('receptionist.detail', compact('guest'));
    }

    public function checkIn(Request $request){
        $guest = Guest::where('id', $request->id)->first();
        DB::table('history')->insert([
            'check_in' => $guest->check_in,
            'check_out' => $guest->check_out,
            'room_total' => $guest->room_total,
            'name' => $guest->name,
            'email' => $guest->email,
            'phone_number' => $guest->phone_number,
            'guest_name' => $guest->guest_name,
            'room_type' => $guest->room_type,
            'status' => 'checked_in'
        ]);

        $guest->delete();
        return redirect('/receptionist/history');
    }

    public function checkOut(Request $request)
    {
        $guest = History::where('id', $request->id)->first();
        $rooms = Rooms::where('type', $guest->room_type)->first();

        $guest->status = 'checked_out';
        $rooms->amount += $guest->room_total;

        $guest->save();
        $rooms->save();

        return redirect('/receptionist/history');
    }
}
