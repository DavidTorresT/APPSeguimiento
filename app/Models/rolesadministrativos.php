<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Model
{
    use HasFactory;
    protected $table = 'tblrolesadministrativos';
    protected $fillable = [
        'Nis', 'Descripcion'
    ];
    public $timestamps = false;
}
