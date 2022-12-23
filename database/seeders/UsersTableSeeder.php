<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= User::where('email', 'slmartis"outlook.com')->first();

        if(!$users){
            User::create([
                'name' => 'Jany',
                'email' => 'slmartis@outlook.com',
                'role'=> 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}
