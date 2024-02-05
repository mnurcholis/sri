<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name'      => 'admin',
            'email'     => 'admin@app.com',
            'password'  => Hash::make('password'),
            'status'     => true,
            'wa'     => '0851',
            'wa_verified_at' => now(),
            'email_verified_at'     => now(),
        ])->assignRole('admin')->givePermissionTo(['home','dashboard','master']);
        User::create([
            'name'      => 'user',
            'email'     => 'user@app.com',
            'password'  => Hash::make('password'),
             'status'     => true,
            'wa'     => '08512',
            'wa_verified_at' => now(),
            'email_verified_at' => now(),
        ])->assignRole('user')->givePermissionTo(['home','dashboard']);
    }
}
