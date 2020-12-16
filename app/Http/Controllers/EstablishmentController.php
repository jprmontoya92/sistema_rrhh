<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\Location;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index(){

        return view('establishments.index');
    }

    public function getEstablishments(){
        $establishments = Establishment::all();

        return response()->json($establishments);
    }

    public function getLocations(Request $request){

        $locations = Location::where('establishment_id',$request->id)->get();

        return response()->json($locations);
    }
}
