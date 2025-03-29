<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function newForm()
    {
        $session = session('user');
        $data = [
            'session' => $session
        ];
        return view('new-form', $data);
    }

    public function formPost(Request $request) {}
}
