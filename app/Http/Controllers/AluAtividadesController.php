<?php

namespace App\Http\Controllers;

use App\Models\AlunosAtividades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AluAtividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Atividades mais popular
        $nomeMaisRepetido = DB::table('alunos_atividades')
            ->select('nome', DB::raw('COUNT(*) as quantidade'))
            ->groupBy('nome')
            ->orderByDesc('quantidade')
            ->value('nome');

        //Atividades menos popular
        $menos_repetido = DB::table('alunos_atividades')
        ->select('nome', DB::raw('COUNT(*) as quantidade'))
        ->groupBy('nome')
        ->orderByDesc('quantidade')
        ->value('nome');

        //Numero de registos

        $numRegistos = DB::table('alunos_atividades')->count();

        //Periodo mais frequentado

        $Periodo = "";

        $manha = AlunosAtividades::whereBetween('created_at', [
            Carbon::parse('08:30:00')->setTimezone('Europe/Lisbon')->format('Y-m-d H:i:s'),
            Carbon::parse('12:00:00')->setTimezone('Europe/Lisbon')->format('Y-m-d H:i:s'),
        ])->count();

        $tarde = AlunosAtividades::whereBetween('created_at', [
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

        $atividadealunos = AlunosAtividades::all();
        return view('Admin.alatividades', [
            'atividadealunos' => $atividadealunos,
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
        //
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
