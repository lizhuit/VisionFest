<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idArticulo';
    protected $fillable = [
        'idArticulo',
        'nombreArticulo',
        'costoArticulo',
        'detalles',
        'idColor',
        'foto',
        'categoria'
    ];
    
    public function color()
    {
        return $this->belongsTo(colores::class, 'idColor', 'idColor');
    }
}