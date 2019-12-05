<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    Protected $table = 'Guru';
    Protected $fillable = ['nama','telp','alamat'];

    Public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
