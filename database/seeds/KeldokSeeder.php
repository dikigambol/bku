<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeldokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keldok')->insert([
            'jenis_ptj' => 'kwitansi pembayaran',
            'nm_keldok' => 'tagihan',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'kwitansi pembayaran',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'konsumsi rapat',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'konsumsi rapat',
            'nm_keldok' => 'dokumentasi',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'konsumsi rapat',
            'nm_keldok' => 'undangan',
            'sub_keldok' => '',
            'formula' => '>= 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'konsumsi rapat',
            'nm_keldok' => 'daftar hadir',
            'sub_keldok' => '',
            'formula' => '>= 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'konsumsi rapat',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => '>= 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'konsumsi rapat',
            'nm_keldok' => 'dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumentasi',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'faktur',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'usulan/permohonan pengadaan',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'hps',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'faktur',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'BA pemerikasaan & dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'bast',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'usulan/permohonan pengadaan',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'memo ppk ke pbj',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'hps',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'undangan pengadaan',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'harga penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'npwp',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'no. rekening',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'pakta integritas',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'legalitas',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba pembukaan dok penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba evaluasi dok penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba klarifikasi dan negosiasi',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba hasil pengadaan',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'memo usulan pemenang dari pbj',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'memo penetapan pemenang',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'surat pengumuman pemenang',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'sppbj',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'spk/kontrak',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'spmk/spp',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'ba pemeriksaan & dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'bast',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'permohonan pembayaran/invoice',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'kwitansi',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan barang/jasa umum',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'faktur',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'undangan kegiatan',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'susunan acara',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'daftar hadir',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumentasi',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'undangan kegiatan',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'susunan acara',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'faktur',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'daftar hadir',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'undangan kegiatan',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'susunan acara',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'kwitansi',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'faktur',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'ba pemeriksaan & dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'bast',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'daftar hadir',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'hps',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'undangan kegiatan',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'susunan acara',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'memo ppk ke pbj',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'hps',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'undangan pengadaan',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'harga penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'npwp',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'no. rekening',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'pakta integritas',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'legalitas',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba pembukaan dok penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba evaluasi dok penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba klarifikasi dan negosiasi',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba hasil pengadaan',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'memo usulan pemenang dari pbj',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'memo penetapan pemenang',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'surat pengumuman pemenang',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'sppbj',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'spk/kontrak',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'spmk/spp',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'ba pemeriksaan & dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'bast',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'daftar hadir',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'permohonan pembayaran/invoice',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'kwitansi',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'pengadaan kegiatan halfday/ fullday/ fullboard',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'faktur',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'honor bulanan',
            'nm_keldok' => 'sk / daftar honorarium',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'honor bulanan',
            'nm_keldok' => 'rincian honor sesuai sbm & perhitungan pajak',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'honor bulanan',
            'nm_keldok' => 'bukti pembayaran honor',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'honor kegiatan',
            'nm_keldok' => 'undangan',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'honor kegiatan',
            'nm_keldok' => 'dokumentasi',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'honor kegiatan',
            'nm_keldok' => 'Rincian honor seusai SBM & perhitungan pajak',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'honor kegiatan',
            'nm_keldok' => 'Bukti pembayaran honor',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Undangan kegiatan',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Kwitansi',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Dokumentasi',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Daftar penerima',
            'sub_keldok' => '',
            'formula' => '< 2000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Undangan kegiatan',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Kwitansi',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Faktur',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Daftar penerima',
            'sub_keldok' => '',
            'formula' => '>= 2000000;< 10000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Undangan kegiatan',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'HPS',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Kwitansi',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Faktur',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'BA pemeriksaan & dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'BAST',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Daftar penerima',
            'sub_keldok' => '',
            'formula' => '>= 10000000;< 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'Undangan kegiatan',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'memo ppk ke pbj',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'hps',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'undangan pengadaan',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'harga penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'npwp',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'no. rekening',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'pakta integritas',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen penawaran',
            'sub_keldok' => 'legalitas',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba pembukaan dok penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba evaluasi dok penawaran',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba klarifikasi dan negosiasi',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'ba hasil pengadaan',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen pengadaan',
            'sub_keldok' => 'memo usulan pemenang dari pbj',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'memo penetapan pemenang',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'surat pengumuman pemenang',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'sppbj',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'spk/kontrak',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'spmk/spp',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'ba pemeriksaan & dokumentasi',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'bast',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'daftar penerima',
            'sub_keldok' => '',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'permohonan pembayaran/invoice',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'kwitansi',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'Pengadaan Seminar Kit',
            'nm_keldok' => 'dokumen penyedia',
            'sub_keldok' => 'faktur',
            'formula' => '>= 50000000',
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'spt dan undangan',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'sppd',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'rincian biaya',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bill hotel',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pergi',
            'sub_keldok' => 'darat:kwitansi bensin',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pergi',
            'sub_keldok' => 'darat:kwitansi tol/bukti transaksi',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pergi',
            'sub_keldok' => 'umum:taksi asal',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pergi',
            'sub_keldok' => 'umum:bill booking',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pergi',
            'sub_keldok' => 'umum:tiket/pass',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pergi',
            'sub_keldok' => 'umum:taksi lokasi',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pulang',
            'sub_keldok' => 'darat:kwitansi bensin',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pulang',
            'sub_keldok' => 'darat:kwitansi tol/bukti transaksi',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pulang',
            'sub_keldok' => 'umum:taksi asal',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pulang',
            'sub_keldok' => 'umum:bill booking',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pulang',
            'sub_keldok' => 'umum:tiket/pass',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'bukti perjalanan pulang',
            'sub_keldok' => 'umum:taksi lokasi',
            'formula' => 0,
        ]);
        DB::table('keldok')->insert([
            'jenis_ptj' => 'perjalanan dinas',
            'nm_keldok' => 'laporan hasil tugas/perjalanan dinas',
            'sub_keldok' => '',
            'formula' => 0,
        ]);
    }
}
