<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'Test User';
        $user->email = 'test@example.com';
        $user->password = Hash::make('Test1234');
        $user->ident = '123456789';
        $user->jurusan_id = 7;

        $user->assignRole('Super Admin');

        $user->save();
    }
}
