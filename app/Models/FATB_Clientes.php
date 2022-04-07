<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FATB_Clientes extends Model
{
    public $table = 'FATB_Clientes';
    protected $fillable = array('FAnv_FiscalColonia', 'FAin_FiscalCP', 'FAnv_Calle', 'FAnv_Tel', 'FAnv_Cel', 'FAnv_RFC',
                                'FAnv_CURP', 'FAnv_Email', 'FAnv_Municipio', 'FAnv_Estado', 'FAnv_APaterno', 'FAnv_AMaterno', 'FAnv_Razon',
                                'FAnv_Sexo', 'FAnv_IFE');
    public $timestamps = false;
    use HasFactory;
}
