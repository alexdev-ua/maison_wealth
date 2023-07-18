<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('admins')->delete();
        DB::table('admins')->insert([
            'name' => 'Alex',
            'email' => 'alex.webdev.13@gmail.com',
            'password' => Hash::make('alex1993'),
            'active' => 1,
            'role' => Admin::ROLE_ADMIN
        ]);
    }
}
