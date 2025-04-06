<?php

namespace App\Http\Controllers;

use App\Models\Carton;
use App\Models\Order;
use App\Models\Polybag;
use App\Services\FormService;
use App\View\Components\Form;
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

    public function editForm($id)
    {
        $session = session('user');
        $order = Order::find($id);
        $polybag = Polybag::where('order_id', $id)->first();
        $carton = Carton::where('order_id', $id)->first();


        $data = [
            'session' => $session,
            'order' => $order,
            'polybag' => $polybag,
            'carton' => $carton,
        ];
        return view('edit-form', $data);
    }

    public function formUpdate(Request $request)
    {
        $session = session('user');

        $order = Order::with(['polybags', 'cartons'])->where('id', $request->id)->first();

        $formservice = new FormService();
        $updated = $formservice->updateOrder($order, $request->all(), $session);

        return $updated
            ? redirect()->route('index')->with('success', 'Form successfully updated!')
            : redirect()->back()->withInput($request->all());
    }
}
