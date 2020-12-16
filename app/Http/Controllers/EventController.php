<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Identifier;
use App\Models\IdentifierValidation;
use Carbon\Carbon;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function events(Request $request){
        
        $events_array = array();

        $this->validate($request, [
            'rut' => 'required|min:8'
        ]);;

        $events = Event::where('user_rut',$request->rut)->whereMonth('created_at',Carbon::now()->month)->get();

        if(count($events) !=0){
            
            foreach($events as $row){
                $location = Identifier::find($row->identifier_id)->location;
                $establishment = $location->establishment;
                
                $event_date = new Carbon($row->created_at);

                $data = array(
                    "establishment" => $establishment->name,
                    "location" => $location->description,
                    "type" => $row->type,
                    "month" => strtoupper($event_date->monthName),
                    "date" => $event_date->isoFormat('LLLL')
                );

                array_push($events_array, $data);
            }

            return response()->json(['events'=> $events_array]);
        }else{

            return response()->json([
                'events' =>[
                    array(
                        'type' => "Sin marca",
                        'month' => strtoupper(Carbon::now()->monthName),
                        'date' => 'Sin marca'
                    )
                ]
            ]);
        }
    }

    public function store(Request $request){

        //valido lo que viene en request

        $this->validate($request,[
            'type'          =>'required',
            'rut'           =>'required',
            'lat'           =>'required',
            'lng'           =>'required',
            'identifier_id' =>'required'
        ]);

        //obtengo un objeto de validation identifier para obtener el campo end_date

        $identifier = IdentifierValidation::where('identifier_id',$request->identifier_id)->orderBy('created_at','desc')->first();

        //verifico si la variable viene con datos

        if(isset($identifier)){
            
            //instancio carbon y le paso end_date
            $end_date = new Carbon($identifier->end_date);
            //obtengo la fecha actual

            //pregunto si end_fecha es mayor que fecha actual

            if($end_date->greaterThan(Carbon::now())){
                
                Event::create([
                    'type' => $request->type,
                    'user_rut' => $request->rut,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'identifier_id' => $request->identifier_id,
                ]);

                return response()->json(['error' => false, 'message' => 'Evento Guardado'],200);

            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Codigo no vigente. Itentar nuevamente'.$end_date. " ".Carbon::now()
                ]);
            }
        }else{
            return response()->json(['error' => true, 'message' => 'Codigo no valido'], 404);
        }
    }
}
