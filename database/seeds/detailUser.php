<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class detailUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detailUsers')->insert([
            'nip' => '10291299',
            'kd_satker' => '238720',
            'unor' => 1,
            'alamat' => 'Jl. Soekarno hatta no2A',
            'telp' => '085233117226',
        ]);
        DB::table('detailUsers')->insert([
            'nip' => '1099887866',
            'kd_satker' => '238720',
            'unor' => 1,
            'alamat' => 'Jl. Soekarno hatta no2A',
            'telp' => '085233117226',
        ]);
        DB::table('detailUsers')->insert([
            'nip' => '0988667465',
            'kd_satker' => '238720',
            'unor' => 1,
            'alamat' => 'Jl. Soekarno hatta no2A',
            'telp' => '085233117226',
        ]);
        DB::table('unor')->insert([
            'id' => 1,
            'name' => 'perikanan',
        ]);
    }
}
