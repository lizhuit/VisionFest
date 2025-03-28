<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCategoria'; 
    protected $fillable=['idCategoria','nombreCategoria'];

    public function categoria()
    {
        return $this->belongsTo(categorias_eventos::class, 'idCategoria', 'idCategoria');
    }
}

