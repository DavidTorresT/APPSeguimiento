<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{
    use HasFactory;
    protected $primaryKey = 'Nis';
    public $incrementing = true;
    protected $table = 'tblcentrosdeformacion';
    protected $fillable = [
        /*'Nis',*/ 'Codigo', 'Denominacion', 'Direccion', 'Observaciones', 'tblregionales_Nis'
    ];
    public $timestamps = false;

    public function regionales()
    {
        return $this->belongsTo(Regionales::class, 'tblregionales_Nis', 'Nis');
    }
}
