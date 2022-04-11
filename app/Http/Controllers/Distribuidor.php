<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FATB_Distibuidor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class Distribuidor extends Controller
{
    //Este metodo retorna la información del distribuidor (Id, estatus, celular, credito, saldo). Requiere el ID del distribuidor.
    public function SHOW(Request $request){
        $distrib = DB::table('FATB_Distibuidor')->where('FAin_Id', $request->distrib)
                     ->join('FATB_DistibuidorEstatus', 'FATB_DistibuidorEstatus.FAnv_Id', '=', 'FATB_Distibuidor.FAnv_Estatus')
                     ->select('FATB_Distibuidor.FAin_Id As Id', 'FATB_Distibuidor.FAnv_NombreCompleto As Nombre', 
                              'FATB_DistibuidorEstatus.FAnv_Descrip As Estatus', 'FATB_Distibuidor.FAnv_TelCel As Celular',
                              'FATB_Distibuidor.FAdc_LineaCredito As Saldo', 'FATB_Distibuidor.FAdc_MontoCred As Limite',
                              'FATB_Distibuidor.FAbt_AceptaElectronica As Electronica')
                     ->get();
        return $distrib;
    }

    //Este metodo retorna las firmas del distribuidor. Requiere el ID del distribuidor.
    public function TraerFirma(Request $request){
        $firmas = DB::table('FATB_DistibuidorFirmas')->where('FAin_IdDis', $request->distrib)
                    ->select('FATB_DistibuidorFirmas.FAin_Numero', 'FATB_DistibuidorFirmas.FAim_Firma')
                    ->get();
        $cont = 0;
        $imagenes = array();
        foreach($firmas as $foto){
            $i = base64_encode($foto->FAim_Firma);
            #"<img src='data:image/png;base64,$i' width=250 height=250>"
            $imagenes[$cont] = $i;
            $cont++;
        }
        return $imagenes;
    }

    //Este metodo retorna un '1' o '0' dependiendo si el distribuidor introducido existe o no.
    public function VerificarExist(Request $request){
        $exist = DB::table('FATB_Distibuidor')->where('FAin_Id', $request->distrib)
                   ->count();
        return $exist;
    }
}