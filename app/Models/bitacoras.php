<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bitacoras extends Model
{
    use HasFactory;
    protected $primaryKey = 'Nis';
    public $incrementing = true;
    protected $table = 'tblbitacoras';
    protected $fillable = [
        /*'Nis',*/ 'NomArchivo', 'Ruta', 'Estado', 'create_at', 'update_at', 'tblusuarios_Nis'
    ];
    public $timestamps = true;

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'tblusuarios_Nis', 'Nis');
    }
}
