<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'lat','lng','establishment_id'];


    public function establishment(){

        //this hace referencia al objeto que tengamos en ese momento de location
        return $this->belongsTo('App\Models\Establishment','location_id');
    }

}
