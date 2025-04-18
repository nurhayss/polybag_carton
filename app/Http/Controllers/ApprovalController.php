<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLogs;
use App\Models\Order;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function createApproval(Request $request)
    {
        $session = session('user');

        $validated = $request->validate([
            'order_id'  => 'required|exists:orders,id',
            'approval'  => 'required|in:setuju,tolak',
            'notes'     => 'nullable|string',
            'signature' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validated['approval'] === 'tolak' && empty($validated['notes'])) {
            return back()->with('error', 'Catatan penolakan wajib diisi.')->withInput();
        }

        if ($validated['approval'] === 'setuju' && !$request->hasFile('signature')) {
            return back()->with('error', 'Tanda tangan wajib diunggah jika menyetujui.')->withInput();
        }

        $signaturePath = null;
        if ($request->hasFile('signature')) {
            $signaturePath = $request->file('signature')->store('signatures', 'public');
        }


        $status = match ($session->role) {
            '1' => $validated['approval'] === 'setuju' ? 1 : 1,
            '2' => $validated['approval'] === 'setuju' ? 2 : -2,
            '3' => $validated['approval'] === 'setuju' ? 3 : -3,
            default => null,
        };

        $role = match ($session->role) {
            '1' => [
                'merchandiser',
                'merchandiser_date',
            ],
            '2' => [
                'follow_up',
                'follow_up_date',
            ],
            '3' => ['purchasing', 'purchasing_date'],
            default => null,
        };


        if (is_null($status)) {
            return back()->with('error', 'Role tidak valid.');
        }

        if ($session->role == 1) {
            ApprovalLogs::create([
                'order_id'       => $validated['order_id'],
                'user_id'        => $session->id,
                'status'         => $status,
                'signature' => $signaturePath,
            ]);
        }

        // Simpan ke approval logs
        ApprovalLogs::create([
            'order_id'       => $validated['order_id'],
            'user_id'        => $session->id,
            'status'         => $status,
            'notes'          => $validated['approval'] === 'tolak' ? $validated['notes'] : null,
            'signature' => $signaturePath,
        ]);


        if ($validated['approval'] === 'tolak') {
            Order::where('id', $validated['order_id'])->update([
                'status'             => $status,
            ]);
        }

        if ($validated['approval'] === 'setuju') {
            Order::where('id', $validated['order_id'])->update([
                $role[0] => $session->name,
                $role[1] => now(),
                'status' => $status
            ]);
        }

        return redirect()->route('index')->with('success', 'Approval berhasil dikirim.');
    }
}
