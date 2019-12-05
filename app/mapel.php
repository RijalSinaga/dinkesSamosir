<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    Protected $table = 'mapel';
    Protected $fillable = ['kode','nama','semester'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
