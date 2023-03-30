<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\AlunosAtividades;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('alunos.create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Alunos.alunos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aluno = Alunos::where('numProcesso', $request->input('numProcesso'))->first();

        // Verifica se a opção "Jogos" foi selecionada e redireciona para a view correspondente
        if ($request->input('atividade') === 'Jogos') {
            return view('Alunos.jogos');
        }

        if ($aluno) {
            $atividade = new AlunosAtividades();
            $atividade->nome = $request->input('atividade');
            $atividade->alunos_id = $aluno->id;
            $atividade->save();

            return redirect(route('apa.index'));
        } else {
            return view('Alunos.alunos2');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
