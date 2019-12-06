<?php

use App\Siswa;
function ranking5Besar()
{
    $siswa = Siswa::all();
    $siswa->map(function($s){
        $s->rataRataNilai = $s->rataRataNilai();
        return $s;
    });
    $siswa->sortByDesc('rataRataNilai')->take(5);
    return $siswa;
}