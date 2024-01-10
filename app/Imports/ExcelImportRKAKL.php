<?php

namespace App\Imports;

use App\Modelrkakl;
use App\ImportLog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ExcelImportRKAKL implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 5;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Modelrkakl([
            "id_import" => $this->kode(),
            "kode" => $row[0] != '' ? $row[0] : '',
            "desc" => $row[1] != '' ? $row[1] : '',
            "vol" => $row[2] != '' ? $row[2] : '',
            "harga" => $row[3] != '' ? $row[3] : '',
            "jumlah" => $row[4] != '' ? $row[4] : '',
            "sb" => $row[5] != '' ? $row[5] : '',
            "sdcp" => $row[6] != '' ? $row[6] : '',
        ]);
    }

    public function kode()
    {
        $kode = ImportLog::max('id');
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
        return $incrementKode;
    }
}
