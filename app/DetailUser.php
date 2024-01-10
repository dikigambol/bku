<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    protected $table = "detailUsers";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function satker()
    {
        return $this->hasOne('App\Satker', 'kd_satker', 'kd_satker');
    }
}
