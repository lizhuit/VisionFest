<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colores extends Model
{
    use HasFactory;
    protected $primaryKey = 'idColor'; 
    protected $fillable=['idColor','nombreColor','hexa'];

    // Relación con detalles
    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'detallesarticulos', 'idColor', 'idArticulo');
    }
}
