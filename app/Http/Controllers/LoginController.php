<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginProcess(Request $request)
    {
        $loginService = new LoginService();
        $login = $loginService->login($request->all());

        return $login
            ? redirect()->route('index')
            :  redirect()->back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput($request->only('email'));
    }


    public function logout()
    {
        $loginService = new LoginService();
        $loginService->logout();

        return redirect()->route('login');
    }
}
