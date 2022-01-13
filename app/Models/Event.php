<?php

namespace App\Models;
//Este es un comentario
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','start','end','idOficina','idSucursal','idPiso','idUsuario','nombre'
    ];
}
