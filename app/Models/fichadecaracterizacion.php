<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichadecaracterizacion extends Model
{
    use HasFactory;
    protected $table = 'tblfichadecaracterizacion';
    protected $fillable = [
        'Nis', 'Codigo', 'Denominacion', 'Cupo', 'FechaInicio', 'FechaFin', 'Observaciones', 'tblprogramasdeformacion_Nis', 'tblcentrosdeformacion_Nis'
    ];
    public $timestamps = false;
}
