<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin'], []);

        $admins = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => '123456789',
                'photo_url' => 'https://picsum.photos/200',
            ]
        ];

        foreach ($admins as $admin) {
            $admin_record = User::create($admin);
            $admin_record->assignRole('admin');
        }
    }
}
