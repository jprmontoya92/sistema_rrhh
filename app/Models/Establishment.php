<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','address'];

    //campos que no se devuelven en las consultas
    protected $hidden = ['created_at', 'updated_at'];


}
