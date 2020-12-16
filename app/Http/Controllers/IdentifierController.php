<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\Location;
use App\Models\Identifier;
use App\Models\IdentifierValidation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Endroid\QrCode\QrCode;


use Illuminate\Http\Request;

class IdentifierController extends Controller
{

    public function index(Request $request){

        $establishment = Establishment::find($request->establishment);
        $location = Location:: find($request->location);

        Cache::put('location',$request->location);

        return view('identifiers.index',compact('establishment','location'));
    }

    public function getIdentifier(){
        
        $identifier = Identifier::where('location_id',Cache::get('location'))->inRandomOrder()->first()->id;

        IdentifierValidation::create([
            'identifier_id' => $identifier,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addSeconds(18)
        ]);

        $qrCode = new QrCode($identifier);
        $qrCode->setSize(100);
        $image = $qrCode->writeString();

        return response()->json([base64_encode($image)]);
    }
    
}
