<?php


namespace Database\Seeders;

use App\Models\Users;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= Users::where('email', 'slmartis"outlook.com')->first();

        if(!$users){
            Users::create([
                'name' => 'Silviani Martis',
                'email' => 'slmartis@outlook.com',
                'role'=> 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}
