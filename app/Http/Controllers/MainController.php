<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'session' => $session,
        ];
        return view('index', $data);
    }

    public function newForm()
    {
        $session = session('user');
        $data = [
            'session' => $session
        ];
        return view('new-form', $data);
    }

    public function accountPage()
    {
        $session = session('user');
        $data = [
            'session' => $session
        ];
        return view('account-page', $data);
    }
}
