<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'Shajib',
        //     'email' => 'shajib@gmail.com',
        //     'password' => Hash::make('shajib')
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Shajib',
        //     'email' => 'shajib@gmail.com',
        //     'password' => Hash::make('shajib')
        // ]);
        // $user = User::find(1);
        // $user->assignRole('super_admin');
        // $user2 = User::find(2);
        // $user2->assignRole('editor');
    }
}
