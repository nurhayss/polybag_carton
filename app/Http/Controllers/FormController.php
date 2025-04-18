<?php

namespace App\Http\Controllers;

use App\Models\Carton;
use App\Models\Order;
use App\Models\Polybag;
use App\Services\FormService;
use App\View\Components\Form;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{


    public function formPost(Request $request)
    {
        $session = session('user');
        $formService = new FormService();

        $validatedData = $formService->validateOrder($request->all());

        $create = $formService->createOrder($validatedData, $session);

        return $create
            ? redirect()->route('data-get', ['po_no' => $create->po_no])->with('success', 'Data successfully added!')
            : redirect()->back()->withInput()->with('error', 'Form creation failed!');
    }

    public function dataGet($id)
    {
        $session = session('user');
        $order = Order::with(['polybags', 'cartons'])->where('po_no', $id)->first();

        $data = [
            'session' => $session,
            'order' => $order,
        ];

        return view('data', $data);
    }

    public function printData($id)
    {
        $session = session('user');
        $order = Order::with(['polybags', 'cartons'])->where('po_no', $id)->first();

        $data = [
            'session' => $session,
            'order' => $order,
            'order' => $order,
            'logo' => asset('/assets/images/logo-polybag.png'),
        ];

        return view('cetak', $data);
    }

    public function pdfData($id)
    {
        $session = session('user');
        $order = Order::with(['polybags', 'cartons'])->where('po_no', $id)->first();

        $data = [
            'session' => $session,
            'order' => $order,
            'logo' => asset('/assets/images/logo-polybag.png'),
        ];
        
        $pdf = Pdf::loadView('cetak', $data);
        return $pdf->download('order-'.$id.'.pdf');        
    }

    public function dataCreatePolybag(Request $request)
    {
        $session = session('user');
        $formService = new FormService();

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $validatedPolybag = $formService->validatePolybagData($data);

        if (isset($validatedPolybag['image']) && $validatedPolybag['image'] instanceof \Illuminate\Http\UploadedFile) {
            $validatedPolybag['image'] = $validatedPolybag['image']->store('polybag_images', 'public');
        }

        $polybag = $formService->createPolybag($validatedPolybag);

        $order = Order::find($polybag->order_id);
        $po_no = optional($order)->po_no;
        return $polybag
            ? redirect()->route('data-get', ['po_no' => $po_no])->with('polybag_success', 'Data Polybag berhasil disimpan!')
            : redirect()->back()->withInput()->with('error', 'Gagal menyimpan data Polybag!');
    }



    public function dataCreateCarton(Request $request)
    {
        $formService = new FormService();

        $data = $request->all();
        $validatedCarton = $formService->validateCartonData($data);

        $carton = $formService->createCarton($validatedCarton);

        $po_no = Order::find($validatedCarton['order_id'])->po_no;
        return $carton
            ? redirect()->route('data-get', ['po_no' => $po_no])
            : redirect()->back()->withInput()->with('error', 'Gagal menyimpan data Carton!');
    }



    public function polybagUpdate(Request $request)
    {
        $formService = new FormService();
        $polybagId = $request->input('polybag_id');

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('polybag_images', 'public');
            $data['image'] = $imagePath;
        }

        $validatedData = $formService->validatePolybagData($data);

        $update = $formService->updatePolybag($validatedData, $polybagId);

        if ($update) {
            $order = Order::find($validatedData['order_id']);
            return redirect()->route('data-get', ['po_no' => $order->po_no])
                ->with('polybag_success', 'Data berhasil diperbarui.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
    }


    public function cartonUpdate(Request $request)
    {
        $formService = new FormService();
        $polybagId = $request->input('polybag_id');

        $data = $request->all();

        $validatedData = $formService->validateCartonData($data);

        $update = $formService->updateCarton($validatedData, $polybagId);

        if ($update) {
            $order = Order::find($validatedData['order_id']);
            return redirect()->route('data-get', ['po_no' => $order->po_no])
                ->with('carton_success', 'Data berhasil diperbarui.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
    }

    public function polybagDelete($id)
    {
        $polybag = Polybag::findOrFail($id);
        $po_no = $polybag->order->po_no;
        $polybag->delete();

        return redirect()->route('data-get', ['po_no' => $po_no])
            ->with('success', 'Data berhasil dihapus.');
    }
    public function cartonDelete($id)
    {
        $carton = Carton::findOrFail($id);
        $po_no = $carton->order->po_no;
        $carton->delete();

        return redirect()->route('data-get', ['po_no' => $po_no])
            ->with('success', 'Data berhasil dihapus.');
    }

    public function polybagEdit($po_no, $id)
    {
        $session = session('user');

        $order = Order::with(['polybags', 'cartons'])->where('po_no', $po_no)->first();
        $polybag = Polybag::where('id', $id)->first();
        $carton = Carton::where('order_id', $order->id)->first();

        $data = [
            'session' => $session,
            'order' => $order,
            'polybag' => $polybag,
            'carton' => $carton,
        ];

        return view('edit-polybag', $data);
    }
    public function cartonEdit($po_no, $id)
    {
        $session = session('user');

        $order = Order::with(['polybags', 'cartons'])->where('po_no', $po_no)->first();
        $polybag = Polybag::where('id', $id)->first();
        $carton = Carton::where('order_id', $order->id)->first();

        $data = [
            'session' => $session,
            'order' => $order,
            'polybag' => $polybag,
            'carton' => $carton,
        ];

        return view('edit-carton', $data);
    }


    public function editForm($id)
    {
        $session = session('user');

        $order = Order::find($id);

        $data = [
            'session' => $session,
            'order' => $order,
        ];

        return view('edit-form', $data);
    }


    public function formUpdate(Request $request)
    {
        $session = session('user');
        $order = Order::with(['polybags', 'cartons'])->findOrFail($request->id);


        $formService = new FormService();
        $validatedData = $formService->validateOrder($request->all());

        // Update order
        $updated = $formService->updateOrder($order, $validatedData, $session);

        return $updated
            ? redirect()->route('index')->with('success', 'Form successfully updated!')
            : redirect()->back()->withInput()->with('error', 'Form update failed!');
    }
}
