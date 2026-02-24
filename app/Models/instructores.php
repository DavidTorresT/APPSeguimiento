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
}
