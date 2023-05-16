<?php

namespace App\Models\Reservas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliticaDeCumplimientos extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad_de_dias'];
}
