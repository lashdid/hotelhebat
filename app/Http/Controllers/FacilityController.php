<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::logout();
        $facilities = Facilities::all();
        return view('facilities', compact('facilities'));
    }

    public function facilities(){
        $facilities = Facilities::all();
        return view('admin.facilities', compact('facilities'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $form_type = "Tambah";
        return view('admin.form.facilities-form', compact('form_type'));
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
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $image = $request->file('image');
        $image_name = time().'.'.$image->getClientOriginalName();
        $request->image->move(public_path('assets'), $image_name);

        DB::table('facilities')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image_name,
        ]);
        
        return redirect('/admin/facility');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        $facility = Facilities::where('id', $request->id)->first();

        return view('admin.form.facilities-detail', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request){
        $facility = Facilities::where('id', $request->id)->first();
        $form_type = "Edit";
        return view('admin.form.facilities-form', compact('form_type', 'facility'));
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
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        
        $facility = Facilities::where('id', $request->id)->first();

        $facility->name = $request->name;
        $facility->description = $request->description;

        if ($request->image != '') {
            unlink(public_path('assets').'/'.$facility->image);

            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('assets'), $image_name);

            $facility->image = $image_name;
        }

        $facility->save();

        return redirect('/admin/facility');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $facility = Facilities::where('id', $request->id)->first();

        $facility->delete();

        return redirect('/admin/facility');
    }
}
