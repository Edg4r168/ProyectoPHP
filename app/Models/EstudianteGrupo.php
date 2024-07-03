<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteGrupo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'estudiante_grupo';

    protected $fillable = [
        'grupo_id',
        'estudiante_id',
    ];

    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }

    public function estudiante() {
        return $this->belongsTo(Estudiante::class);
    }
}
