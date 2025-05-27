<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeders extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'id' => Str::uuid(),
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'sex' => 'Female',
                'birthday' => '1984-05-14',
                'username' => 'alicejohnson',
                'email' => 'alice.johnson@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'verification_token' => null,
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'Bob',
                'last_name' => 'Williams',
                'sex' => 'Male',
                'birthday' => '1992-11-25',
                'username' => 'bobwilliams',
                'email' => 'bob.williams@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => null,
                'verification_token' => Str::random(32),
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'Charlie',
                'last_name' => 'Davis',
                'sex' => 'Male',
                'birthday' => '1986-12-08',
                'username' => 'charliedavis',
                'email' => 'charlie.davis@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => null,
                'verification_token' => Str::random(32),
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'Diana',
                'last_name' => 'Garcia',
                'sex' => 'Female',
                'birthday' => '1993-02-19',
                'username' => 'dianagarcia',
                'email' => 'diana.garcia@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'verification_token' => null,
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'Ethan',
                'last_name' => 'Martinez',
                'sex' => 'Male',
                'birthday' => '1987-07-30',
                'username' => 'ethanmartinez',
                'email' => 'ethan.martinez@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => null,
                'verification_token' => Str::random(32),
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'Fiona',
                'last_name' => 'Lopez',
                'sex' => 'Female',
                'birthday' => '1994-09-12',
                'username' => 'fionalopez',
                'email' => 'fiona.lopez@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => null,
                'verification_token' => Str::random(32),
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'George',
                'last_name' => 'Harris',
                'sex' => 'Male',
                'birthday' => '1985-03-22',
                'username' => 'georgeharris',
                'email' => 'george.harris@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
                'verification_token' => null,
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'Hannah',
                'last_name' => 'Thompson',
                'sex' => 'Female',
                'birthday' => '1991-10-05',
                'username' => 'hannaht',
                'email' => 'hannah.thompson@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => null,
                'verification_token' => Str::random(32),
            ],
            [
                'id' => Str::uuid(),
                'first_name' => 'Isaac',
                'last_name' => 'Young',
                'sex' => 'Male',
                'birthday' => '1989-01-17',
                'username' => 'isaacyoung',
                'email' => 'isaac.young@itelec3.test',
                'password' => Hash::make('password123'),
                'agreed_to_terms' => true,
                'user_type' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => null,
                'verification_token' => Str::random(32),
            ],
        ];

        // Mark all Admins as verified, Customers as not
        foreach ($users as &$user) {
            if ($user['user_type'] === 'Admin') {
                $user['email_verified_at'] = now();
                $user['verification_token'] = null;
            }
        }
        unset($user);

        DB::table('usersinfo')->insert($users);
    }
}