<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallesarticulos extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'iddetalle';
    protected $fillable = [
        'iddetalle',
        'idArticulo',
        'idColor'
    ];

    // Relación con el modelo Color
    public function color()
    {
        return $this->belongsTo(Color::class, 'idColor', 'idColor');
    }

    // Relación con el modelo Articulo
    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'idArticulo', 'idArticulo');
    }
}
