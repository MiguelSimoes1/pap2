<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use Illuminate\Http\Request;

class ProfessordbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professores::all();
        return view('Admin.Professor.professores', [
            'professores' => $professores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Professor.create');
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
            'numProcesso' => ['required', 'regex:/^f\d{4}$/'],
            'nome' => ['required', 'string', 'max:100'],
            'idade' => ['required', 'integer', 'min:1', 'max:99'],
            'email' => ['required', 'email'],
        ]);

        // Validar se o número de processo e o email já existem na base de dados
        $numProcessoExistente = Professores::where('numProcesso', $request->numProcesso)->exists();
        $emailExistente = Professores::where('email', $request->email)->exists();

        if ($numProcessoExistente) {
            return view('Admin.Professor.create2');
        }

        if ($emailExistente) {
            return view('Admin.Professor.create2');
        }

        Professores::create($request->all());
        return redirect()->route('professoresdb.index');
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
        {
            $professor = Professores::findOrFail($id);
            return view('Admin.Professor.edit',[
                'professor' => $professor
            ]);
        }
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
        {
            $professor = Professores::findOrFail($id);
            $professor->update($request->all());
            return redirect()->route('professoresdb.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = Professores::findOrFail($id);
        $professor->delete();
        return redirect()->route('professoresdb.index');
    }
}
