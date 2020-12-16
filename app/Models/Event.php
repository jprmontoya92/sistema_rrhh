<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function events($rut){
        return Events::where('user_id',$rut)->whereMonth('created_at', Carbon::now()->month)->get();
    }
}
