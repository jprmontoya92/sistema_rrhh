<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifier extends Model
{
    use HasFactory;

    //forzo el campo a string
    protected $casts = ['id' => 'string'];

    public function location(){
        
        return $this->belongsTo('App\Models\Location','location_id');
    }
}
