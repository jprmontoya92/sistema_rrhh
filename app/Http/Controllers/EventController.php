<?php

namespace App\Http\Controllers;
use App\Models\Event;
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

}
