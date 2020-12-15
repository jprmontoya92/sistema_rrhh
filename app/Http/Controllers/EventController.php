<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show($user){
        
        $events = Event::find($user);

        return response()->json(["message" => $events]);
    }
}
