<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_satker extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'detail_satker';
    protected $guarded = [];

    public function satker()
    {
        return $this->belongsTo('App\Satker', 'id', 'id_satker');
    }
}
