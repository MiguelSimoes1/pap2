<?php

namespace App\Http\Controllers;

use App\Models\Userlogin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = Userlogin::where('nome', $request->input('nome'))
        ->where('palavrapasse', $request->input('password'))
        ->first();
        if ($user) {
            return redirect()->route('admin.index');
        } else {
            return view('login2');
        }
    }
}
