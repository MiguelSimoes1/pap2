<?php

namespace App\Models;

use App\Models\AlunosAtividades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;

    protected $fillable = [
        'numProcesso',
        'nome',
        'idade',
        'email',
        // 'turma_id',
    ];

    public function alunos_atividades()
    {
        $this->hasMany(AlunosAtividades::class);
    }
}
