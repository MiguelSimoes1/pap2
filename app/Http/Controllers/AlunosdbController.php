<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use Illuminate\Http\Request;

class AlunosdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Alunos::all();
        return view('Admin.Alunos.alunos' , [
            'alunos' => $alunos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numProcesso' => ['required'],
            'nome' => ['required', 'string', 'max:100'],
            'idade' => ['required', 'integer', 'min:1', 'max:99'],
            'email' => ['required', 'email'],
        ]);

        // Validar se o número de processo e o email já existem na base de dados
        $numProcessoExistente = Alunos::where('numProcesso', $request->numProcesso)->exists();
        $emailExistente = Alunos::where('email', $request->email)->exists();

        if ($numProcessoExistente) {
            return view('Admin.Alunos.create2');
        }

        if ($emailExistente) {
            return view('Admin.Alunos.create2');
        }

        Alunos::create($request->all());
        return redirect()->route('alunodb.index');
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
        $aluno = Alunos::findOrFail($id);
        return view('Admin.Alunos.edit',[
            'aluno' => $aluno
        ]);
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
        $aluno = Alunos::findOrFail($id);
        $aluno->update($request->all());
        return redirect()->route('alunodb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Alunos::findOrFail($id);
        $aluno->delete();
        return redirect()->route('alunodb.index');
    }
}
