<?php

namespace App\Models\Reservas;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['fecha_reserva', 'observacion', 'slug', 'cliente_id', 'paquete_id', 'estado_reservas_id'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['fecha_reserva','cliente_id'])
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


}
