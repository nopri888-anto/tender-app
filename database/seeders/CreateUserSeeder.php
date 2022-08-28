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
                'name' => 'Superadmin',
                'username' => 'Superadmin',
                'email' => 'Superadmin@tender.co.id',
                'is_role' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Admin1',
                'username' => 'Admin1',
                'email' => 'Admin1@tender.co.id',
                'is_role' => '2',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
