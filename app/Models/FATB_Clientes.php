<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FATB_Clientes extends Model
{
    public $table = 'FATB_Clientes';
    protected $primarykey = 'FAnv_CveCliente';
    protected $fillable = array('FAnv_Razon', 'FAnv_Cd', 'FAnv_FiscalCd', 'FAnv_FiscalColonia', 'FAnv_ApartadoPost', 'FAnv_DirFiscal',
                                'FAnv_Calle', 'FAnv_Cel', 'FAnv_APaterno', 'FAnv_AMaterno', 'FAnv_Nombres');
    public $timestamps = false;
    use HasFactory;
}
