<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = [
        [
            'username' => 'Superadmin',
            'email' => 'Superadmin@tender.co.id',
            'is_role' => '1',
            'password' => bcrypt('123456'),
        ],
        [
            'username' => 'Admin',
            'email' => 'Admin@tender.co.id',
            'is_role' => '2',
            'password' => bcrypt('123456'),
        ],
        [
            'username' => 'Penyedia',
            'email' => 'Penyedia@tender.co.id',
            'is_role' => '3',
            'password' => bcrypt('123456'),
        ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
