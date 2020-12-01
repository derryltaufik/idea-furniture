<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@g.com',
                'password' => Hash::make('admin'),
                'address' => 'Confidental',
                'gender' => 'Male',
                'date_of_birth' => '01/01/2000',
                'role' => 'admin'
            ],
            [
                'name' => 'Member No.1',
                'email' => 'member@g.com',
                'password' => Hash::make('member'),
                'address' => 'Jln. kemana-mana naik unta',
                'gender' => 'Male',
                'date_of_birth' => '01/01/2000',
                'role' => 'member'
            ],
        ];

        foreach($users as $user){
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'address' => $user['address'],
                'gender' => $user['gender'],
                'date_of_birth' => $user['date_of_birth'],
                'role' => $user['role'],
            ]);
        }
    }
}
