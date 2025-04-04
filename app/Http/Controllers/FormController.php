<?php

namespace App\Http\Controllers;

use App\Models\Carton;
use App\Models\Order;
use App\Models\Polybag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{


    public function formPost(Request $request)
    {
        $session = session('user');
        $validate =  $request->validate([
            'po_no'        => 'required|string',
            'order_no'     => 'required|string',
            'style'        => 'required|string',
            'date'         => 'required|date',
            'buyer'        => 'required|string',
            'qty_garment'  => 'required|integer',
            'shipment'     => 'required|string',
            'location'     => 'required|string',
            'gmt_delivery' => 'required|date',
            'packing'      => 'required',
            'plastic_quality'      => 'required',
            'thickness'      => 'required',
            'print_warning'      => 'required',

            'pack'         => 'required|string',
            'size'         => 'required|string',
            'length'       => 'required|numeric',
            'width'        => 'required|numeric',
            'qty_order'     => 'required|integer',
            'isi'          => 'required|integer',
            'kebutuhan'    => 'required|integer',
            'qty_beli'     => 'required|integer',

            'carton_packing' => 'required|string',
            'quality' => 'required|string',
            'carton_length' => 'required|integer',
            'carton_width' => 'required|integer',
            'carton_height' => 'required|integer',
            'volume'       => 'required|string',
            'qty'          => 'required|integer',
            'weight'       => 'required|string',
        ]);


        if (!$validate) {
            return back()->withErrors($validate);
        }

        try {
            DB::beginTransaction();
            $order = Order::create([
                'po_no'       => $request->po_no,
                'order_no'    => $request->order_no,
                'style'       => $request->style,
                'date'        => $request->date,
                'buyer'       => $request->buyer,
                'qty_garment' => $request->qty_garment,
                'shipment'     => $request->shipment,
                'location'     => $request->location,
                'gmt_delivery' => $request->gmt_delivery,
                'packing'      => $request->packing,
                'plastic_quality' => $request->plastic_quality,
                'thickness'      => $request->thickness,
                'print_warning'      => $request->print_warning,
                'created_by'      => $session->name,
                'created_date' => Carbon::now(),
                'status'      => 1,
            ]);

            $polybag = Polybag::create([
                'order_id'   => $order->id,
                'pack'       => $request->pack,
                'size'       => $request->size,
                'length'     => $request->length,
                'width'      => $request->width,
                'qty_order'   => $request->qty_order,
                'isi'        => $request->isi,
                'kebutuhan'  => $request->kebutuhan,
                'qty_beli'   => $request->qty_beli,
            ]);



            $carton = Carton::create([
                'order_id'      => $order->id,
                'packing' => $request->carton_packing,
                'quality' => $request->quality,
                'length' => $request->carton_length,
                'width' => $request->carton_width,
                'height' => $request->carton_height,
                'volume'       => $request->volume,
                'qty'          => $request->qty,
                'weight'       => $request->weight,
            ]);


            DB::commit();

            return redirect()->route('index')->with('success', 'Data berhasil dibuat!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
