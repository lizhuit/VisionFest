<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informes extends Model
{
    use HasFactory;
    protected $primaryKey = 'idInforme  '; 
    protected $fillable=['idInforme ','idCliente','mensaje'];
}
