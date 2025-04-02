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
        'fotoD',
        'foto',
        'idCategoria'
    ];
    
    public function color()
    {
        return $this->belongsTo(colores::class, 'idColor', 'idColor');
    }
    
    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'idCategoria', 'idCategoria');
    }
    
    // Accesor para la ruta de la imagen
    public function getRutaImagenAttribute()
    {
        $subcarpeta = match($this->categoria->nombreCategoria) {
            'Bodas' => 'boda',
            'XV' => 'xv',
            'Cumpleaños' => 'cumple',
            'Bautizos' => 'bau',
            default => 'otros'
        };
        
        return "img/articulos/$subcarpeta/{$this->foto}";
    }
    protected $casts = [
        'costoArticulo' => 'float',
        // otros campos si es necesario
    ];

    // Accesor para la imagen daltónica
    public function getRutaImagenDaltoniAttribute()
    {
        $subcarpeta = match($this->categoria->nombreCategoria) {
            'Bodas' => 'boda',
            'XV' => 'xv',
            'Cumpleaños' => 'cumple',
            'Bautizos' => 'bau',
            default => 'otros'
        };
        
        return "img/articulos/$subcarpeta/{$this->fotoD}";
    }
    public function colores()
{
    return $this->belongsToMany(Color::class, 'detallesarticulos', 'idArticulo', 'idColor');
}
}