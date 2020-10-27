<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    Protected $table = 'Test';
    Protected $fillable = ['tanggal','test'];

    public function covid19()
    {
        return $this->belongsToMany(Covid19::class)->withPivot(['jlh']);
    }

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class);
    }
}
