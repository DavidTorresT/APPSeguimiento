<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    use HasFactory;
    protected $primaryKey = 'Nis';
    public $incrementing = true;
    protected $table = 'tblinstructores';
    protected $fillable = [
        /*'Nis',*/ 'tbltiposdocumentos_Nis', 'NumDoc', 'Nombres', 'Apellidos', 'Direccion', 'Telefono', 'CorreoInstitucional', 'CorreoPersonal', 'Sexo', 'FechaNac', 'tbleps_Nis', 'tblrolesadministrativos_Nis'
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

    public function rolesadministrativos()
    {
        return $this->belongsTo(RolesAdministrativos::class, 'tblrolesadministrativos_Nis', 'Nis');
    }
}
