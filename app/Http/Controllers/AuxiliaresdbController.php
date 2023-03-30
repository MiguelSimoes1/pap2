<?php

namespace App\Http\Controllers;

use App\Models\Auxiliares;
use Illuminate\Http\Request;

class AuxiliaresdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auxiliares = Auxiliares::all();
        return view('Admin.Auxiliares.auxiliares', [
            'auxiliares' => $auxiliares,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Auxiliares.create');
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
        $numProcessoExistente = Auxiliares::where('numProcesso', $request->numProcesso)->exists();
        $emailExistente = Auxiliares::where('email', $request->email)->exists();

        if ($numProcessoExistente) {
            return view('Admin.Auxiliares.create2');
        }

        if ($emailExistente) {
            return view('Admin.Auxiliares.create2');
        }

        Auxiliares::create($request->all());
        return redirect()->route('auxiliaresdb.index');
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
            $auxiliar = Auxiliares::findOrFail($id);
            return view('Admin.Auxiliares.edit',[
                'auxiliar' => $auxiliar
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
            $auxiliar = Auxiliares::findOrFail($id);
            $auxiliar->update($request->all());
            return redirect()->route('auxiliaresdb.index');
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
        $auxiliar = Auxiliares::findOrFail($id);
        $auxiliar->delete();
        return redirect()->route('auxiliaresdb.index');
    }
}
