<?php

namespace App\Http\Controllers;

use App\Models\Carton;
use App\Models\Order;
use App\Models\Polybag;
use App\Services\FormService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{


    public function formPost(Request $request)
    {
        $session = session('user');
        $formservice = new FormService();
        $create = $formservice->createOrder($request->all(), $session);

        return $create
            ? redirect()->route('index')->with('success', 'Form successfully created!')
            : redirect()->back()->withInput($request->all());
    }
}
