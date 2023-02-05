<?php

namespace App\Models\Viajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaTransportes extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_empresa'];
}
