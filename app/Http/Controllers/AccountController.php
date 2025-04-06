<?php

namespace App\Http\Controllers;

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
}
