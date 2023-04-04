<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class ViajePaquetes extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['id','descripcion', 'fecha', 'hora', 'cantidad_participantes', 'estado', 'cod_string', 'slug', 'paquete_id'];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('cod_string')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
