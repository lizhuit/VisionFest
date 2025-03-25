<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCliente  '; 
    protected $fillable=['idCliente ','nombreCliente','correo','direccion','idEstado','telefono'];
}
