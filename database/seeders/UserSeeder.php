<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Merchandiser',
                'email' => 'md@gmail.com',
                'password' => 'admin',
                'role' => '1'
            ],
            [
                'name' => 'Follow Up',
                'email' => 'fu@gmail.com',
                'password' => 'admin',
                'role' => '2'
            ],
            [
                'name' => 'Purchasing',
                'email' => 'pur@gmail.com',
                'password' => 'admin',
                'role' => '3'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
