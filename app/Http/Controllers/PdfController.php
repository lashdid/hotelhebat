<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function show(Request $request){
        if($request->has('download')){
            $guest = Guest::where('id', $request->id)->first();
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('recept-pdf', ['guest' => $guest])->setPaper('a4', 'potrait');
            return $pdf->download('hotelhebat-recept.pdf');
        }
        else{
            return redirect('/');
        }
    }
}
