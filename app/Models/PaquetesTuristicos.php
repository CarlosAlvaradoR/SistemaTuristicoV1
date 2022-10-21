<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class PaquetesTuristicos extends Model
{
    use HasFactory;
    use HasSlug;
    protected $fillable=['nombre', 'precio', 'precio_dolares', 'estado', 'imagen_principal', 'slug', 'tipo_paquete_id'];

    //protected  $primaryKey = 'slug';

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nombre')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
