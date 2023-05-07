<?php

namespace Database\Seeders\Pedidos;

use App\Models\Pedidos\TipoComprobantes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoComprobantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'FACTURA']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'RECIBO POR HONORARIOS']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'BOLETA DE VENTA']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'LIQUIDACION DE COMPRA']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => ' CARTA DE PORTE AEREO']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'NOTA DE CREDITO']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'NOTA DE DEBITO']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'GUIA DE REMISION - REMITENTE']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'BOLETO DE VIAJE-TRANSPORTE INTERPROVINCIA']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'COMPROBANTE DE RETENCION']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'POLIZA DE ADJUDICACION POR REMATE DE BIEN']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'DOCUMENTO DE ATRIBUCION']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'GUIA DE REMISION - TRANSPORTISTA']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'MANIFIESTO DE PASAJEROS']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'COMPROBANTE DE PERCEPCION']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'COMPROBANTE DE PERCEPCION VENTA INTERNA']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'DOCS. EMIT. EMPRESAS ADQUIRIENTES TARJ CRED']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'BOLETOS COMPANIAS AVIACION TRANS. NO REGULAR']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'BILLETES DE LOTERIA, RIFAS Y APUESTAS']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'DOCS. CENT. EDUCAT. CULTUR. ACT. NO GRAVADAS']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'FORMULARIO DECLARACION - PAGO TRIB. INTERNOS']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'COMPROBANTE DE OPERACIONES - LEY N. 29972']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'CONSTANCIA DE IVAP']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'BVME PARA TRANSPORTE FERROVIARIO DE PASAJEROS']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'SEAE COMPROBANTES DE PAGO PARA SERV.AEROPORT.']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'GRE REMITENTE - BIENES FISCALIZABLES']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'GRE REMITENTE COMPLEMENTARIA - BIENES FISCALI']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'GRE TRANSPORTISTA - BIENES FISCALIZABLES']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'GRE TRANSPORTISTA COMPLEMENTARIA - BIEN. FISC.']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'NOTA DE CREDITO ESPECIAL']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'NOTA DE DEBITO ESPECIAL']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'NOTA DE AJUSTE DE OPERACIONES']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'EXCESO DE CREDITO FISCAL POR RETIRO DE BIENES']);
        $tipo = TipoComprobantes::create(['nombre_tipo' => 'OTROS-CONSOLIDADO DE BOLETAS DE VENTA']);
        // $tipo = TipoComprobantes::create(['nombre_tipo' => '']);
        // $tipo = TipoComprobantes::create(['nombre_tipo' => '']);
        // $tipo = TipoComprobantes::create(['nombre_tipo' => '']);
        // $tipo = TipoComprobantes::create(['nombre_tipo' => '']);
        // $tipo = TipoComprobantes::create(['nombre_tipo' => '']);
        // $tipo = TipoComprobantes::create(['nombre_tipo' => '']);
    }
}
