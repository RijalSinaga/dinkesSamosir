<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    Protected $table = 'pegawai';
    Protected $fillable = 
    [
        'nip',
        'user_id',
        'nama',
        'jk',
        'alamat',
        'agama',
        'tmt_pns',
        'kedudukan_pns',
        'status_pegawai',
        'tmt_cpns',
        'no_sk_cpns',
        'tgl_sk_cpns',
        'gol',
        'pangkat',
        'tmt_gol_terakhir',
        'masa_kerja_tahun',
        'masa_kerja_bulan',
        'jenis_jabatan',
        'nama_jabatan',
        'tmt_eselon',
        'tmt_jabatan',
    ];

    Public function getAvatar (){
        if(!$this->avatar){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }
}
