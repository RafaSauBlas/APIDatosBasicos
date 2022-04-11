<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FATB_Distibuidor extends Model
{
    public $table = 'FATB_Distibuidor';
    protected $primarykey = 'FAin_Id';
    protected $fillable = array('FAnv_APaterno', 'FAnv_AMaterno', 'FAnv_Nombres', 'FAnv_NombreCompleto', 'FAnv_Calle', 'FAin_FiscalCP', 'FAnv_FiscalColonia',
                                'FAnv_FiscalCd', 'FAnv_FiscalMunicipio', 'FAnv_FiscalEstado', 'FAnv_TelCasa', 'FAnv_TelCel', 'FAnv_Estatus',
                                'FAdc_LineaCredito');
    public $timestamps = false;
}
