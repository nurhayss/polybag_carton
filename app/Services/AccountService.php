<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountService
{
    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
                'role'     => $data['role'],
            ]);
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(array $data, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);

            $updateData = [
                'name'  => $data['name'],
                'email' => $data['email'],
                'role'  => $data['role'],
            ];

            if (!empty($data['password'])) {
                $updateData['password'] = Hash::make($data['password']);
            }

            $user->update($updateData);

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



    public function validateData(array $data): array
    {
        return Validator::make($data, [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'role'                  => 'required|in:1,2,3',
        ])->validate();
    }
}
