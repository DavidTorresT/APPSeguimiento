<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    use HasFactory;
    protected $primaryKey = 'Nis';
    public $incrementing = true;
    protected $table = 'tblaprendices';
    protected $fillable = [
        /*'Nis',*/ 'tbltiposdocumentos_Nis', 'NumDoc', 'Nombres', 'Apellidos', 'Direccion', 'Telefono', 'CorreoInstitucional', 'CorreoPersonal', 'Sexo', 'FechaNac', 'tbleps_Nis'
    ];
    public $timestamps = false;

    public function getSexoTextoAttribute()
    {
        return match ($this->Sexo) {
            1 => 'Masculino',
            2 => 'Femenino',
            default => 'No definido'
        };
    }

    public function tipodocumento()
    {
        return $this->belongsTo(TiposDocumentos::class, 'tbltiposdocumentos_Nis', 'Nis');
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class, 'tbleps_Nis', 'Nis');
    }
}
