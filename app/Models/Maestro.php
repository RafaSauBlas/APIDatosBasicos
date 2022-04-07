<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = array('nombre', 'appaterno', 'apmaterno', 'correo');
    use HasFactory;
}
