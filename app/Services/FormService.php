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

    public function updateOrder($order, array $validatedData, $session)
    {

        DB::beginTransaction();
        try {
            $tes = $order->update([
                'po_no'            => $validatedData['po_no'],
                'order_no'         => $validatedData['order_no'],
                'style'            => $validatedData['style'],
                'date'             => $validatedData['date'],
                'buyer'            => $validatedData['buyer'],
                'qty_garment'      => $validatedData['qty_garment'],
                'shipment'         => $validatedData['shipment'],
                'location'         => $validatedData['location'],
                'gmt_delivery'     => $validatedData['gmt_delivery'],
                'arrived_at'       => $validatedData['arrived_at'],
                'packing'          => $validatedData['packing'],
                'plastic_quality'  => $validatedData['plastic_quality'],
                'thickness'        => $validatedData['thickness'],
                'print_warning'    => $validatedData['print_warning'],
                'created_by'       => $session->name,
                'created_date'     => Carbon::now(),
                'status'           => 1,
            ]);


            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            return false;
        }
    }


    public function createPolybag(array $validatedData): Polybag
    {
        DB::beginTransaction();
        try {
            $polybag = Polybag::create([
                'order_id'   => $validatedData['order_id'],
                'pack'       => $validatedData['pack'],
                'size'       => $validatedData['size'],
                'length'     => $validatedData['length'],
                'width'      => $validatedData['width'],
                'qty_order'  => $validatedData['qty_order'],
                'isi'        => $validatedData['isi'],
                'kebutuhan'  => $validatedData['kebutuhan'],
                'qty_beli'   => $validatedData['qty_beli'],
                'image'      => $validatedData['image'] ?? null,
            ]);

            DB::commit();
            return $polybag;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function createCarton(array $validatedData): int
    {
        DB::beginTransaction();
        try {
            $carton = Carton::create([
                'order_id'    => $validatedData['order_id'],
                'packing'     => $validatedData['carton_packing'],
                'quality'     => $validatedData['quality'],
                'length'      => $validatedData['carton_length'],
                'width'       => $validatedData['carton_width'],
                'height'      => $validatedData['carton_height'],
                'volume'      => $validatedData['volume'],
                'qty'         => $validatedData['qty'],
                'weight'      => $validatedData['weight'],
                'total_order' => $validatedData['total_order'],
            ]);

            DB::commit();
            return $carton->order_id;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }



    public function updatePolybag(array $data, int $polybagId): bool
    {
        $validated = $this->validatePolybagData($data);

        $polybag = Polybag::findOrFail($polybagId);

        $polybag->update([
            'order_id'   => $validated['order_id'],
            'pack'       => $validated['pack'],
            'size'       => $validated['size'],
            'length'     => $validated['length'],
            'width'      => $validated['width'],
            'qty_order'  => $validated['qty_order'],
            'isi'        => $validated['isi'],
            'kebutuhan'  => $validated['kebutuhan'],
            'qty_beli'   => $validated['qty_beli'],
        ]);

        return true;
    }

    public function updateCarton(array $data): bool
    {
        $validated = $this->validateCartonData($data);

        $carton = Carton::where('order_id', $validated['order_id'])->first();

        if (!$carton) {
            $carton = new Carton(['order_id' => $validated['order_id']]);
        }

        $carton->fill([
            'packing'     => $validated['carton_packing'],
            'quality'     => $validated['quality'],
            'length'      => $validated['carton_length'],
            'width'       => $validated['carton_width'],
            'height'      => $validated['carton_height'],
            'volume'      => $validated['volume'],
            'qty'         => $validated['qty'],
            'weight'      => $validated['weight'],
            'total_order' => $validated['total_order'],
        ])->save();

        return true;
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
            'packing'      => 'required|array',
            'plastic_quality' => 'required|integer',
            'thickness'    => 'required|string',
            'print_warning' => 'required|string',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        return $validator->validated();
    }


    public function validatePolybagData(array $data): array
    {
        $rules = [
            'order_id'   => 'required|exists:orders,id',
            'pack'       => 'required|string',
            'size'       => 'required|string',
            'length'     => 'required|numeric',
            'width'      => 'required|numeric',
            'qty_order'  => 'required|integer',
            'isi'        => 'required|integer',
            'kebutuhan'  => 'required|integer',
            'qty_beli'   => 'required|integer',
        ];

        $validator = validator($data, $rules);

        if (isset($data['image']) && !empty($data['image'])) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        $validator = validator($data, $rules);

        if ($validator->fails()) {
            dd($validator->errors());
        }

        return $validator->validated();
    }




    public function validateCartonData(array $data): array
    {
        $validator = validator($data, [
            'order_id'       => 'required|exists:orders,id',
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
