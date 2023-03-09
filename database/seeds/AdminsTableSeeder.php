<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert([
            'name' => 'sunnydvg',
            'email' => 'sunnydvg@mail.com',
            'password' => Hash::make('SunnY_DvG_20'),
        ]);
    }
}
