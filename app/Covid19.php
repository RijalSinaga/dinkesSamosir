<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid19 extends Model
{
    Protected $table = 'covid19';
    Protected $fillable = ['puskesmas','swab_test','rapid_test','avatar','user_id','test_id'];

    Public function getAvatar (){
        if(!$this->avatar){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function test()
    {
        return $this->belongsToMany(Test::class)->withPivot(['jlh'])->WithTimeStamps();
    }
    
    public function puskesmas()
    {
        return $this->belongsToMany(Puskesmas::class)->withPivot(['jlh'])->WithTimeStamps();
    }

    // Public function rataRataNilai()
    // {
    //     $total = 0 ;
    //     $hitung = 0;
    //     foreach ($this->mapel as $mapel) {
    //         $total += $mapel->pivot->nilai;
    //         $hitung++;
    //     }
    //     $rata=($hitung!=0)?($total/$hitung)*1:0;

    //     // return round($total/$hitung);
    //     return round($rata);
        
    // }
}
