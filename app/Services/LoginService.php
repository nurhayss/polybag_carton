<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginService
{
    public function login(array $credentials): bool
    {
        $validated = $this->validateData($credentials);

        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            Session::put('user', $user);
            return true;
        }

        return false;
    }

    public function logout(): void
    {
        Session::remove('user');
    }

    private function validateData(array $data): array
    {
        return validator($data, [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();
    }
}
