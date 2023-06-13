<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait GestionArchivosTrait
{
    //rutaCompleta = 'Pedidos/PagoProveedores/image.png';
    public function crearArchivo($rutaCompleta,$nombreArchivo)
    {
        //$rutaArchivo = 'Pedidos/PagoProveedores/' . $nombreArchivo; // Obtén la ruta completa del archivo
        // $rutaArchivo = $rutaCompleta . $nombreArchivo; // Obtén la ruta completa del archivo

        // // Guarda el archivo en el disco privado
        // Storage::disk('private')->put($rutaArchivo, $contenido);

        // return true;

        $archivo = $nombreArchivo->store($rutaCompleta, 'private');
        return $archivo;
    }

    public function eliminarArchivo($rutaArchivo)
    {
        //$rutaArchivo = 'Pedidos/PagoProveedores/' . $nombreArchivo; // Obtén la ruta completa del archivo

        // Verifica la existencia del archivo
        if (Storage::disk('private')->exists($rutaArchivo)) {
            // Borra el archivo
            Storage::disk('private')->delete($rutaArchivo);

            return true;
        }

        return false;
    }
}
