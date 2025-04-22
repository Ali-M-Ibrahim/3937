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
     */
    public function run(): void
    {
        $user = new User();
        $user->name= "Ali Ibrahim";
        $user->email = "admin@hotmail.com";
        $user->password = Hash::make("123");
        $user->address = "Beirut";
        $user->is_admin=true;
        $user->save();


        $user = new User();
        $user->name= "Ali Ibrahim";
        $user->email = "user@hotmail.com";
        $user->password = Hash::make("123");
        $user->address = "Beirut";
        $user->is_admin=false;
        $user->save();

        User::factory(100)->create();
    }
}
