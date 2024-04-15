<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
        ]);
        // dd('Seeder is running');
        // $users = [
        //     [
        //         'name' => 'John Doe',
        //         'email' => 'john@example.com',
        //         'password' => Hash::make('password123'),
        //     ],
        //     [
        //         'name' => 'Jane Doe',
        //         'email' => 'jane@example.com',
        //         'password' => Hash::make('password456'),
        //     ],
        //     // Add more users as needed
        // ];
        // // Insert users into the database
        // foreach ($users as $user) {
        //     User::create([
        //         'name' => 'Jane Doe',
        //         'email' => 'jane@example.com',
        //         'password' => Hash::make('password456'),
        //     ]);
        // }
    }
}
