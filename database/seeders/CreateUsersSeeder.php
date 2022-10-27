<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'Admin',
                'lname' => 'Ws',
                'gender' => 'male',
                'birthday' => '2000-06-25',
                'tel' => '093000001',
                'address' => 'Pattani',
                'email' => 'admin@admin.com',
                'is_admin' => '1',
                'password' => bcrypt('1234'),
                // 'picture' => 'img_avatar.png'
            ],
            [
                'name' => 'User',
                'lname' => 'Ws',
                'gender' => 'male',
                'birthday' => '2002-01-31',
                'tel' => '092000001',
                'address' => 'Pattani',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => bcrypt('1234') ,
                // 'picture' => 'img_avatar.png'
            ]
        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
