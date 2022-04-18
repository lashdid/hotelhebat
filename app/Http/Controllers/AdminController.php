<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function users(){
        $users = User::where('type', 'resepsionis')->get();

        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_type = "Tambah";
        return view('admin.form.users-form', compact('form_type'));
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
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'type' => 'resepsionis',
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/admin/user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $form_type = "Edit";
        if($user->type == 'resepsionis'){
            return view('admin.form.users-form', compact('form_type', 'user'));
        }

        return redirect('/admin/user');
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
            'email' => 'required|string',
        ]);
        
        $user = User::where('id', $request->id)->first();

        $user->name = $request->name;
        $user->type = 'resepsionis';
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        
        if($user->type == 'resepsionis'){
            $user->delete();
        }

        return redirect('/admin/user');
    }
}
