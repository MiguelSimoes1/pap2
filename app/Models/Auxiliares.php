<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auxiliares extends Model
{
    use HasFactory;

    protected $fillable = [
        'numProcesso',
        'nome',
        'idade',
        'email',
        'turma_id',
    ];
}
