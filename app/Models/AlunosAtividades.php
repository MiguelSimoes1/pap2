<?php

namespace App\Models;

use App\Models\Alunos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunosAtividades extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'nome',
    ];

    protected $table = 'alunos_atividades';

    public function aluno()
    {
        return $this->belongsTo(Alunos::class);
    }
}
