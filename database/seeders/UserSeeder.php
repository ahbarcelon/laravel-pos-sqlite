<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['user_id' => 'USR-1001', 'username' => 'sdelgado', 'full_name' => 'Sofia Delgado', 'email' => 'sofia.delgado@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2026-01-12 09:00:00'],
            ['user_id' => 'USR-1002', 'username' => 'pbautista', 'full_name' => 'Paolo Bautista', 'email' => 'paolo.bautista@example.com', 'role' => 'Cashier', 'status' => 'Active', 'created_at' => '2026-02-03 09:00:00'],
            ['user_id' => 'USR-1003', 'username' => 'jtan', 'full_name' => 'Jasmine Tan', 'email' => 'jasmine.tan@example.com', 'role' => 'Staff', 'status' => 'Active', 'created_at' => '2026-02-18 09:00:00'],
            ['user_id' => 'USR-1004', 'username' => 'lfernandez', 'full_name' => 'Luis Fernandez', 'email' => 'luis.fernandez@example.com', 'role' => 'Cashier', 'status' => 'Inactive', 'created_at' => '2026-03-07 09:00:00'],
            ['user_id' => 'USR-1005', 'username' => 'mramos', 'full_name' => 'Mikaela Ramos', 'email' => 'mikaela.ramos@example.com', 'role' => 'Staff', 'status' => 'Active', 'created_at' => '2026-04-21 09:00:00'],
            ['user_id' => 'USR-1006', 'username' => 'aflores', 'full_name' => 'Adrian Flores', 'email' => 'adrian.flores@example.com', 'role' => 'Admin', 'status' => 'Active', 'created_at' => '2026-05-15 09:00:00'],
        ];

        User::upsert(
            $users,
            ['user_id'],
            ['username', 'full_name', 'email', 'role', 'status', 'updated_at']
        );
    }
}
