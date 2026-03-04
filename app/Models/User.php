<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'tblusuarios';
    protected $primaryKey = 'Nis';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'Nis',
        'Correo',
        'Contrasena'
    ];

    protected $hidden = [
        'Contrasena'
    ];

    public function getAuthPassword()
    {
        return $this->Contrasena;
    }
}
