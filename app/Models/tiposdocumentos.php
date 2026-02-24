<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiposdocumentos extends Model
{
    use HasFactory;
    protected $primaryKey = 'Nis';
    protected $table = 'tbltiposdocumentos';
    protected $fillable = [
        /*'Nis',*/ 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;
}
