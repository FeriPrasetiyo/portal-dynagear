<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Super Admin', 'email' => 'superadmin@dynagear.test', 'role' => 'super_admin'],
            ['name' => 'Manager PL', 'email' => 'managerpl@dynagear.test', 'role' => 'manager_pl'],
            ['name' => 'Admin PL', 'email' => 'adminpl@dynagear.test', 'role' => 'admin_pl'],
            ['name' => 'Manager Sales', 'email' => 'managersales@dynagear.test', 'role' => 'manager_sales'],
            ['name' => 'Admin Sales', 'email' => 'adminsales@dynagear.test', 'role' => 'admin_sales'],
            ['name' => 'Assembling', 'email' => 'assembling@dynagear.test', 'role' => 'assembling'],
            ['name' => 'Gudang', 'email' => 'gudang@dynagear.test', 'role' => 'gudang'],
            ['name' => 'Purchasing', 'email' => 'purchasing@dynagear.test', 'role' => 'purchasing'],
            ['name' => 'Sales', 'email' => 'sales@dynagear.test', 'role' => 'sales'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'role' => $user['role'],
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}