<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'satker';
    protected $guarded = [];

    public function det_satker()
    {
        return $this->hasOne('App\Detail_satker', 'id_satker');
    }
}
