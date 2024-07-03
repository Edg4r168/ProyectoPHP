<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'asistencia';

    protected $fillable = [
        'grupo_id',
        'estudiante_id',
        'fecha',
        'hora_entrada'
    ];

    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }

    public function estudiante() {
        return $this->belongsTo(Estudiante::class);
    }
}
