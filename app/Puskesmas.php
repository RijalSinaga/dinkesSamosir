<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    Protected $table = 'Puskesmas';
    Protected $fillable = ['nama','alamat'];

    Public function test()
    {
        return $this->hasMany(Test::class);
    }
}
