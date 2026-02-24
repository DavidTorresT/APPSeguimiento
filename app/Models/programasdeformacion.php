<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programasdeformacion extends Model
{
    use HasFactory;
    protected $primaryKey = 'Nis';
    public $incrementing = true;
    protected $table = 'tblprogramasdeformacion';
    protected $fillable = [
        /*'Nis',*/ 'Codigo', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;
}
