<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function createUser()
    {
        $accountService = new AccountService();
        $create = $accountService->create(request()->all());

        return $create
            ? redirect(route('account-page') . '#list')->with('success', 'User successfully created!')
            : redirect()->back()->withInput(request()->all());
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $delete = $user->delete();

        return $delete
            ? redirect(route('account-page') . '#list')->with('success', 'User successfully deleted!')
            : redirect()->back()->withInput(request()->all());
    }

    public function editUser($id)
    {
        $session = session('user');
        $user = User::find($id);
        $data = [
            'session' => $session,
            'user' => $user,
        ];


        return view('edit-account', $data);
    }

    public function updateUser(Request $request)
    {
        $accountService = new AccountService();
        $id = $request->input('id'); // Ambil ID dari input hidden
        $update = $accountService->update($request->all(), $id); // Kirim data & ID

        return $update
            ? redirect(route('account-page') . '#list')->with('success', 'User berhasil diperbarui!')
            : redirect()->back()->withInput($request->all());
    }
}
