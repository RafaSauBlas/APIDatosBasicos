<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FATB_DistibuidorVales;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class Vales extends Controller
{

    //Este metodo retorna la indormación del vale (folio, saldo, distrib, estatus y nombre del distrib). Requiere el folio
    public function SHOW(Request $request)
    {
        $vale = DB::table('FATB_DistibuidorVales')->where('folio', $request->folio)
                  ->leftJoin('FATB_Distibuidor', 'FATB_Distibuidor.FAin_Id', '=', 'FATB_DistibuidorVales.FAin_IdDistri')
                  ->select('FATB_DistibuidorVales.folio', 'FATB_DistibuidorVales.FAdc_Saldo',
                           'FATB_DistibuidorVales.FAin_IdDistri', 'FATB_DistibuidorVales.FAnv_Estatus',
                           'FATB_Distibuidor.FAnv_NombreCompleto')
                  ->get();
        return $vale;
        // foreach($vale as $dist){
        //     $dist->FAdc_Saldo = number_format(floatval($dist->FAdc_Saldo), 2);
        //     $imagenes = Valeras::SHOWFIRMAS($dist->FAin_IdDistri);
        //     return array($vale, $imagenes);
        // }
    }

    //Este metodo retorna las firmas asociadas al distribuidor del vale. Requiere el ID del distrib.
    public function SHOWFIRMAS(Request $request){
        $firma = DB::table('FATB_DistibuidorFirmas')->where('FAin_IdDis', $request->dist)
                   ->select('FATB_DistibuidorFirmas.FAim_Firma')->get();
        $cont = 0;
        $imagenes = array();
        foreach($firma as $foto){
            $i = base64_encode($foto->FAim_Firma);
            #"<img src='data:image/png;base64,$i' width=250 height=250>"
            $imagenes[$cont] = $i;
            $cont++;
        }
        return $imagenes;
    }
}