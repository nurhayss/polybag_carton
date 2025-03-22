<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function login()
    {
        return view('authentication.login');
    }

    public function index()
    {
        $session = session('user');
        $data = [
            'session ' => $session,
        ];
        return view('index', $data);
    }
}
