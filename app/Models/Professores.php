<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    use HasFactory;

    protected $fillable = [
        'numProcesso',
        'nome',
        'idade',
        'email',
        // 'turma_id',

    ];

    public function professores_atividades()
    {
        $this->hasMany(ProfessoresAtividades::class);
    }
}
