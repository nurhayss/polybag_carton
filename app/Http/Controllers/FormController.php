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
        $formService = new FormService();

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $validatedData = $formService->validateData($data);

        if (isset($validatedData['image'])) {
            $validatedData['image'] = $validatedData['image']->store('polybag-images', 'public');
        }

        $create = $formService->createOrder($validatedData, $session);

        return $create
            ? redirect()->route('index')->with('success', 'Form successfully created!')
            : redirect()->back()->withInput()->with('error', 'Form creation failed!');
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
        $order = Order::with(['polybags', 'cartons'])->findOrFail($request->id);

        $formService = new FormService();
        $validatedData = $formService->validateData($request->all());

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('polybag-images', 'public');
        }
        $updated = $formService->updateOrder($order, $validatedData, $session);

        return $updated
            ? redirect()->route('index')->with('success', 'Form successfully updated!')
            : redirect()->back()->withInput()->with('error', 'Form update failed!');
    }
}
