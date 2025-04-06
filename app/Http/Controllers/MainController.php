<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        $orders = Order::get();

        $data = [
            'session' => $session,
            'orders' => $orders,
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
        $users = User::get();
        $data = [
            'session' => $session,
            'users' => $users
        ];
        return view('account-page', $data);
    }
}
