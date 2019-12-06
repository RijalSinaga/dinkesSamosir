<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    Protected $table = 'Siswa';
    Protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id'];

    Public function getAvatar (){
        if(!$this->avatar){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->WithTimeStamps();
    }

    Public function rataRataNilai()
    {
        $total = 0;
        $hitung = 0;
        foreach ($this->mapel as $mapel) {
            $total += $mapel->pivot->nilai;
            $hitung++;
        }
        return round($total/$hitung);
    }

    Public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }
}
