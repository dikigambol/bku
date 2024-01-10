<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis')->insert([
            'id_jenis' => 1,
            'nm_jenis' => 'LS-BENDAHARA',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('jenis')->insert([
            'id_jenis' => 2,
            'nm_jenis' => 'UP',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('jenis')->insert([
            'id_jenis' => 3,
            'nm_jenis' => 'TUP',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('jenis')->insert([
            'id_jenis' => 4,
            'nm_jenis' => 'LS pihak ketiga',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
