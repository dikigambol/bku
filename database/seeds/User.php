<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id_detuser' => 1,
            'fullname' => 'Salman Khan',
            'name' => 'admin',
            'role' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'id_detuser' => 2,
            'fullname' => 'Reza rahadian',
            'name' => 'bp',
            'role' => 2,
            'email' => 'reza@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'id_detuser' => 3,
            'fullname' => 'Hamdan maliki',
            'name' => 'bpp',
            'role' => 3,
            'email' => 'hamdan@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
