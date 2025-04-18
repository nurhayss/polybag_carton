<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLogs;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function login()
    {
        return view('authentication.login');
    }

    public function index()
    {
        $session = session('user');

        $orders = Order::with('approval.user')->get();

        foreach ($orders as $order) {
            $rejectedLog = $order->approval->where('status', '<', 0)->first();
            ($order->approval->notes = $rejectedLog?->notes);
            $order->approval->approved_by = $rejectedLog?->user?->name ?? null;
            $order->approval->created_at = $rejectedLog?->created_at;
        }

        return view('index', [
            'session' => $session,
            'orders' => $orders,
        ]);
    }


    public function newForm()
    {
        $session = session('user');
        $order = Order::get();
        $orderMap = $order->pluck('style', 'order_no');
        $data = [
            'session' => $session,
            'order' => $order,
            'orderMap' => $orderMap,
        ];
        return view('new-form', $data);
    }

    public function accountPage()
    {
        $session = session('user');
        $users = User::get();
        $data = [
            'session' => $session,
            'users' => $users
        ];
        return view('account-page', $data);
    }
}
