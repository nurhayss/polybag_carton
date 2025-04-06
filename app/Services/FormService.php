<?php

namespace App\Services;

use App\Models\Carton;
use App\Models\Order;
use App\Models\Polybag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FormService
{
    public function createOrder(array $validatedData, $session)
    {
        DB::beginTransaction();
        try {
            $order = Order::create([
                'po_no'       => $validatedData['po_no'],
                'order_no'    => $validatedData['order_no'],
                'style'       => $validatedData['style'],
                'date'        => $validatedData['date'],
                'buyer'       => $validatedData['buyer'],
                'qty_garment' => $validatedData['qty_garment'],
                'shipment'    => $validatedData['shipment'],
                'location'    => $validatedData['location'],
                'gmt_delivery' => $validatedData['gmt_delivery'],
                'packing'       => $validatedData['packing'],
                'plastic_quality' => $validatedData['plastic_quality'],
                'thickness'      => $validatedData['thickness'],
                'print_warning'  => $validatedData['print_warning'],
                'created_by'     => $session->name,
                'created_date'   => Carbon::now(),
                'status'         => 1,
            ]);

            Polybag::create([
                'order_id'   => $order->id,
                'pack'       => $validatedData['pack'],
                'size'       => $validatedData['size'],
                'length'     => $validatedData['length'],
                'width'      => $validatedData['width'],
                'qty_order'  => $validatedData['qty_order'],
                'isi'        => $validatedData['isi'],
                'kebutuhan'  => $validatedData['kebutuhan'],
                'qty_beli'   => $validatedData['qty_beli'],
            ]);

            Carton::create([
                'order_id'      => $order->id,
                'packing'       => $validatedData['carton_packing'],
                'quality'       => $validatedData['quality'],
                'length'        => $validatedData['carton_length'],
                'width'         => $validatedData['carton_width'],
                'height'        => $validatedData['carton_height'],
                'volume'        => $validatedData['volume'],
                'qty'           => $validatedData['qty'],
                'weight'        => $validatedData['weight'],
            ]);

            DB::commit();
            return $order;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateOrder($order, array $validatedData, $session)
    {
        DB::beginTransaction();
        try {
            $order->update([
                'po_no'            => $validatedData['po_no'],
                'order_no'         => $validatedData['order_no'],
                'style'            => $validatedData['style'],
                'date'             => $validatedData['date'],
                'buyer'            => $validatedData['buyer'],
                'qty_garment'      => $validatedData['qty_garment'],
                'shipment'         => $validatedData['shipment'],
                'location'         => $validatedData['location'],
                'gmt_delivery'     => $validatedData['gmt_delivery'],
                'packing'          => $validatedData['packing'],
                'plastic_quality'  => $validatedData['plastic_quality'],
                'thickness'        => $validatedData['thickness'],
                'print_warning'    => $validatedData['print_warning'],
                'created_by'       => $session->name,
                'created_date'     => Carbon::now(),
                'status'           => 1,
            ]);


            $order->polybags()->update([
                'pack'      => $validatedData['pack'],
                'size'      => $validatedData['size'],
                'length'    => $validatedData['length'],
                'width'     => $validatedData['width'],
                'qty_order' => $validatedData['qty_order'],
                'isi'       => $validatedData['isi'],
                'kebutuhan' => $validatedData['kebutuhan'],
                'qty_beli'  => $validatedData['qty_beli'],
            ]);

            $order->cartons()->update([
                'packing'   => $validatedData['carton_packing'],
                'quality'   => $validatedData['quality'],
                'length'    => $validatedData['carton_length'],
                'width'     => $validatedData['carton_width'],
                'height'    => $validatedData['carton_height'],
                'volume'    => $validatedData['volume'],
                'qty'       => $validatedData['qty'],
                'weight'    => $validatedData['weight'],
            ]);

            DB::commit();
            return $order;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }



    public function validateData(array $data): array
    {
        return validator($data, [
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
            'plastic_quality' => 'required',
            'thickness'      => 'required',
            'print_warning'  => 'required',

            'pack'         => 'required|string',
            'size'         => 'required|string',
            'length'       => 'required|numeric',
            'width'        => 'required|numeric',
            'qty_order'    => 'required|integer',
            'isi'          => 'required|integer',
            'kebutuhan'    => 'required|integer',
            'qty_beli'     => 'required|integer',

            'carton_packing' => 'required|string',
            'quality'        => 'required|string',
            'carton_length'  => 'required|integer',
            'carton_width'   => 'required|integer',
            'carton_height'  => 'required|integer',
            'volume'         => 'required|string',
            'qty'            => 'required|integer',
            'weight'         => 'required|string',
        ])->validate();
    }
}
