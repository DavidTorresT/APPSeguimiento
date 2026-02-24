<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eps extends Model
{
    use HasFactory;
    protected $primaryKey = 'Nis';
    public $incrementing = true;
    protected $table = 'tbleps';
    protected $fillable = [
        /*'Nis',*/ 'Numdoc', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;

}
