<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('usersinfo')->insert([
            [
                'id' => Str::uuid(),
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'sex' => 'Male',
                'birthday' => '1979-01-01',
                'username' => 'admin_user',
                'email' => 'admin@itelec3.test',
                'password' => Hash::make('adminpass'),
                'user_type' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'Sheena',
                'last_name' => 'Doe',
                'sex' => 'Female',
                'birthday' => '1996-04-27',
                'username' => 'sheena_doe',
                'email' => 'sheena_doe@itelec3.test',
                'password' => Hash::make('sheenapass'),
                'user_type' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
