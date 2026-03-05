<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichadecaracterizacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'Nis';
    public $incrementing = true;
    protected $table = 'tblfichasdecaracterizacion';
    protected $fillable = [
        /*'Nis',*/ 'Codigo', 'Denominacion', 'Cupo', 'FechaInicio', 'FechaFin', 'Observaciones', 'tblprogramasdeformacion_Nis', 'tblcentrosdeformacion_Nis'
    ];
    public $timestamps = false;

    public function programasdeformacion()
    {
        return $this->belongsTo(programasdeformacion::class, 'tblprogramasdeformacion_Nis', 'Nis');
    }
    public function centrosdeformacion()
    {
        return $this->belongsTo(centrosdeformacion::class, 'tblcentrosdeformacion_Nis', 'Nis');
    }
}
