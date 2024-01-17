<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportLog extends Model
{
    protected $table = "import_log";
    protected $guarded = [];

    public static function countRecords($kdDokumen)
    {
        $jumlahData = self::where('kd_dokumen', $kdDokumen)->count();

        return $jumlahData;
    }

    /**
     * @param string $kdDokumen
     * @param string $jenis
     * @return bool|int
     */
    public static function isJenisUniqueForKdDokumen($kdDokumen, $jenis)
    {
        $existingData = self::where('kd_dokumen', $kdDokumen)
            ->where('jenis', $jenis)
            ->first();

        return $existingData ? $existingData->id : true;
    }
}
