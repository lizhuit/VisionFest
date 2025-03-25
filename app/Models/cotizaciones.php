<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotizaciones extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCotizacion  '; 
    protected $fillable=['idCotizacion ','cantidad','totalCotizacion','idCliente','fecha'];
}
