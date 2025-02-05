<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name' => 'admin',
                    'middlename' => null,
                    'lastname' => null,
                    'password' => Hash::make('administrator'),
                    'school'=> null,
                    'class' => null,
                    'email' => 'admin@admin.com',
                    'role'=>'admin'
                ],
            ]
        );
    }
}
