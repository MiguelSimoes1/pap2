<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\AlunosJogos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AlJogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Jogos mais populares
        $nomeMaisRepetido = DB::table('alunos_jogos')
        ->select('nome', DB::raw('COUNT(*) as quantidade'))
        ->groupBy('nome')
        ->orderByDesc('quantidade')
        ->value('nome');

        //Jogos menos populares

        $menos_repetido = DB::table('alunos_jogos')
        ->select('nome', DB::raw('COUNT(*) as quantidade'))
        ->groupBy('nome')
        ->orderByDesc('quantidade')
        ->value('nome');

        //Quantidade de registos
        $numRegistos = DB::table('alunos_jogos')->count();

        //Periodo mais usual
        $Periodo = "";

        $manha = AlunosJogos::whereBetween('created_at', [
            Carbon::parse('08:30:00')->setTimezone('Europe/Lisbon')->format('Y-m-d H:i:s'),
            Carbon::parse('12:00:00')->setTimezone('Europe/Lisbon')->format('Y-m-d H:i:s'),
        ])->count();

        $tarde = AlunosJogos::whereBetween('created_at', [
            Carbon::parse('12:01:00')->setTimezone('Europe/Lisbon')->format('Y-m-d H:i:s'),
            Carbon::parse('18:00:00')->setTimezone('Europe/Lisbon')->format('Y-m-d H:i:s'),
        ])->count();

        if ($manha > $tarde) {
            $Periodo = "Periodo da manhã";
        } else if ($tarde > $manha) {
            $Periodo = "Período da tarde";
        } else {
            $Periodo = "Nenhum periodo";
        }

        $jogoalunos = AlunosJogos::all();
        return view('Admin.aljogos', [
            'jogoalunos' => $jogoalunos,
            'nomeMaisRepetido' => $nomeMaisRepetido,
            'menos_repetido' => $menos_repetido,
            'numRegistos' => $numRegistos,
            'manha' => $manha,
            'tarde' => $tarde,
            'Periodo' => $Periodo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Verificar se o numProcesso já existe na tabela alunos
    $aluno = Alunos::where('numProcesso', $request->numProcesso)->first();

    if (!$aluno) {
        // Se o aluno não existir, redirecionar de volta ao formulário com uma mensagem de erro
        return view('Alunos.jogos2');
    }

    // Se o aluno existir, salvar a entrada na tabela alunos_jogos
    $jogo = new AlunosJogos;
    $jogo->nome = $request->input('jogo');
    $jogo->alunos_id = $aluno->id;
    $jogo->save();

    // Redirecionar para uma página de confirmação ou para o próprio formulário com uma mensagem de sucesso
    return redirect(route('apa.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
