<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FATB_Clientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Cliente extends Controller
{
    //CAMBIAR EL METODO DE BUSQUEDA, EN LUGAR DE HACERLO UTILIZANDO LA CLAVE UTILIZAR LA CURP.

    //Este metodo retorna los datos básicos del cliente. Requiere de la clave del cliente (FAnv_CveCliente).
    public function SHOW(Request $request){
        $cliente = DB::table('FATB_Clientes')->where('FAnv_CURP', $request->FAnv_CURP)
        ->select('FATB_Clientes.FAnv_CveCliente', 'FATB_Clientes.FAnv_Razon', 'FATB_Clientes.FAnv_FiscalColonia', 'FATB_Clientes.FAin_FiscalCP',
                 'FATB_Clientes.FAnv_Calle', 'FATB_Clientes.FAnv_Tel', 'FATB_Clientes.FAnv_Cel', 'FATB_Clientes.FAnv_RFC', 'FATB_Clientes.FAnv_CURP',
                 'FATB_Clientes.FAnv_Email', 'FATB_Clientes.FAnv_Municipio', 'FATB_Clientes.FAnv_Estado', 'FATB_Clientes.FAnv_APaterno',
                 'FATB_Clientes.FAnv_AMaterno', 'FATB_Clientes.FAnv_IFE', 'FATB_Clientes.FAnv_Sexo')
        ->get();
        return $cliente;
    }

    //Este metodo retorna 1 o 0 dependiendo si el cliente introducido existe o no. Requiere la clave del cliente (FAnv_CveCliente)
    public function VerificarExist(Request $request){
        $exist = DB::table('FATB_Clientes')->where('FAnv_CURP', $request->FAnv_CURP)
                   ->count();
        return $exist;
    }

    //Este metodo registra la información de los nuevos clientes
    public function RegistrarCliente(Request $request){
        $cliente = new FATB_Clientes($request->all());
        $cliente->save();
        return "El cliente '". $cliente->FAnv_Razon. "' ha sido registrado correctamente.";

        /* ===== Dato a registrar =====
        FAnv_FiscalColonia      FAin_FiscalCP
        FAnv_Calle              FAnv_Tel
        FAnv_Cel                FAnv_RFC
        FAnv_CURP               FAnv_Email
        FAnv_Municipio          FAnv_Estado
        FAnv_APaterno           FAnv_AMaterno
        FAnv_Razon              FAnv_Sexo
        FAnv_IFE
        */
    }

    //Este metodo actualiza la información del cliente ingresado. Requiere la clave del cliente (FAnv_CveCliente).
    public function EditarCliente (Request $request){
        $Cliente = DB::table('FATB_Clientes')->where('FAnv_CveCliente', $request->FAnv_CveCliente)
        ->update([
            'FAnv_FiscalColonia' => strtoupper($request->FAnv_FiscalColonia),
            'FAin_FiscalCP' => strtoupper($request->FAin_FiscalCP),
            'FAnv_Calle' => strtoupper($request->FAnv_Calle),
            'FAnv_Tel' => strtoupper($request->FAnv_Tel),
            'FAnv_Cel' => strtoupper($request->FAnv_Cel),
            'FAnv_RFC' => strtoupper($request->FAnv_RFC),
            'FAnv_CURP' => strtoupper($request->FAnv_CURP),
            'FAnv_Email' => strtoupper($request->FAnv_Email),
            'FAnv_Municipio' => strtoupper($request->FAnv_Municipio),
            'FAnv_Estado' => strtoupper($request->FAnv_Estado),
            'FAnv_APaterno' => strtoupper($request->FAnv_APaterno),
            'FAnv_AMaterno' => strtoupper($request->FAnv_AMaterno),
            'FAnv_Razon' => strtoupper($request->FAnv_Razon),
            'FAnv_Sexo' => strtoupper($request->FAnv_Sexo),
            'FAnv_IFE' => strtoupper($request->FAnv_IFE)
        ]);
        return response ("Los datos del cliente se han modificado correctamente.", 200);
    }

    //Preguntar que campos serían utilizados como campos clave.
    public function VerificarCambios(Request $request){
        $Cliente1 = DB::table('FATB_Clientes')
                      ->where('FAnv_CveCliente', $request->FAnv_CveCliente)
                      ->get();
    }
}
