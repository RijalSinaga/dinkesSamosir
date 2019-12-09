<?php

use App\Siswa;
use App\Guru;

function ranking5Besar()
{
    $siswa = Siswa::all();
    $siswa->map(function($s){
        $s->rataRataNilai = $s->rataRataNilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
    // return view('dashboard.index', compact('siswa'));
    return $siswa;
}

function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Guru::count();
}