<?php

namespace App\Http\Controllers;

use App\Models\Userlogin;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userslogin = Userlogin::all();
        return view('Admin.Administradores.admin' , [
            'userslogin' => $userslogin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Administradores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = Userlogin::where('nome', $request->nome)->exists();

        if ($nome) {
            return view('Admin.Administradores.create2');
        } else {
            $request->validate([
                'nome' => 'required',
                'password' => 'required',
            ]);

            // criar um novo registro de usuário
            $userlogin = new Userlogin;
            $userlogin->nome = $request->input('nome');
            $userlogin->palavrapasse = $request->input('password');
            $userlogin->save();

            return redirect()->route('administrador.index');
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
        $userlogin = Userlogin::findOrFail($id);
        return view('Admin.Administradores.edit',[
            'userlogin' => $userlogin
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
        $userlogin = Userlogin::findOrFail($id);
        $userlogin->update($request->all());
        return redirect()->route('administrador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userlogin = Userlogin::findOrFail($id);
        $userlogin->delete();
        return redirect()->route('administrador.index');
    }
}
