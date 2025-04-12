<?php

namespace App\Services;

use App\Models\Carton;
use App\Models\Order;
use App\Models\Polybag;
use Carbon\Carbon;
use Illuminate\Contracts\Support\ValidatedData;
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
                'arrived_at' => $validatedData['arrived_at'] ?? null,
                'packing'       => $validatedData['packing'],
                'plastic_quality' => $validatedData['plastic_quality'],
                'thickness'      => $validatedData['thickness'],
                'print_warning'  => $validatedData['print_warning'],
                'created_by'     => $session->name,
                'created_date'   => Carbon::now(),
                'status'         => 1,
            ]);

            DB::commit();
            return $order;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    // public function updateOrder($order, array $validatedData, $session)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $order->update([
    //             'po_no'            => $validatedData['po_no'],
    //             'order_no'         => $validatedData['order_no'],
    //             'style'            => $validatedData['style'],
    //             'date'             => $validatedData['date'],
    //             'buyer'            => $validatedData['buyer'],
    //             'qty_garment'      => $validatedData['qty_garment'],
    //             'shipment'         => $validatedData['shipment'],
    //             'location'         => $validatedData['location'],
    //             'gmt_delivery'     => $validatedData['gmt_delivery'],
    //             'arrived_at'     => $validatedData['arrived_at'],
    //             'packing'          => $validatedData['packing'],
    //             'plastic_quality'  => $validatedData['plastic_quality'],
    //             'thickness'        => $validatedData['thickness'],
    //             'print_warning'    => $validatedData['print_warning'],
    //             'created_by'       => $session->name,
    //             'created_date'     => Carbon::now(),
    //             'status'           => 1,
    //         ]);


    //         $order->polybags()->update([
    //             'pack'      => $validatedData['pack'],
    //             'size'      => $validatedData['size'],
    //             'length'    => $validatedData['length'],
    //             'width'     => $validatedData['width'],
    //             'qty_order' => $validatedData['qty_order'],
    //             'isi'       => $validatedData['isi'],
    //             'kebutuhan' => $validatedData['kebutuhan'],
    //             'qty_beli'  => $validatedData['qty_beli'],
    //             'image'   => $validatedData['image'],

    //         ]);

    //         $order->cartons()->update([
    //             'packing'   => $validatedData['carton_packing'],
    //             'quality'   => $validatedData['quality'],
    //             'length'    => $validatedData['carton_length'],
    //             'width'     => $validatedData['carton_width'],
    //             'height'    => $validatedData['carton_height'],
    //             'volume'    => $validatedData['volume'],
    //             'qty'       => $validatedData['qty'],
    //             'weight'    => $validatedData['weight'],
    //             'total_order'        => $validatedData['total_order'],

    //         ]);

    //         DB::commit();
    //         return $order;
    //     } catch (\Throwable $e) {
    //         DB::rollBack();
    //         throw $e;
    //     }
    // }

    public function createData(array $validatedData, $session)
    {
        DB::beginTransaction();
        try {
            $order_id = $validatedData['order_id'];

            Polybag::create([
                'order_id'   => $order_id,
                'pack'       => $validatedData['pack'],
                'size'       => $validatedData['size'],
                'length'     => $validatedData['length'],
                'width'      => $validatedData['width'],
                'qty_order'  => $validatedData['qty_order'],
                'isi'        => $validatedData['isi'],
                'kebutuhan'  => $validatedData['kebutuhan'],
                'qty_beli'   => $validatedData['qty_beli'],
                'image'      => $validatedData['image'],
            ]);

            Carton::create([
                'order_id'       => $order_id,
                'packing'        => $validatedData['carton_packing'],
                'quality'        => $validatedData['quality'],
                'length'         => $validatedData['carton_length'],
                'width'          => $validatedData['carton_width'],
                'height'         => $validatedData['carton_height'],
                'volume'         => $validatedData['volume'],
                'qty'            => $validatedData['qty'],
                'weight'         => $validatedData['weight'],
                'total_order'    => $validatedData['total_order'],
            ]);

            DB::commit();
            return $order_id;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function validateOrder(array $data): array
    {
        $validator = validator($data, [
            'po_no'        => 'required|string',
            'order_no'     => 'required|string',
            'style'        => 'required|string',
            'date'         => 'required|date',
            'buyer'        => 'required|string',
            'qty_garment'  => 'required|integer',
            'shipment'     => 'required|string',
            'location'     => 'required|string',
            'gmt_delivery' => 'required|date',
            'arrived_at'   => 'nullable|date',
            'packing'      => 'required',
            'plastic_quality' => 'required',
            'thickness'    => 'required',
            'print_warning' => 'required',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        return $validator->validated();
    }

    public function validateData(array $data): array
    {
        $validator = validator($data, [
            'order_id'    => 'required|exists:orders,id',
            'pack'        => 'required|string',
            'size'        => 'required|string',
            'length'      => 'required|numeric',
            'width'       => 'required|numeric',
            'qty_order'   => 'required|integer',
            'isi'         => 'required|integer',
            'kebutuhan'   => 'required|integer',
            'qty_beli'    => 'required|integer',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'carton_packing' => 'required|string',
            'quality'        => 'required|string',
            'carton_length'  => 'required|numeric',
            'carton_width'   => 'required|numeric',
            'carton_height'  => 'required|numeric',
            'volume'         => 'required|string',
            'qty'            => 'required|integer',
            'weight'         => 'required|string',
            'total_order'    => 'required|integer',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        return $validator->validated();
    }
}
