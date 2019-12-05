<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    Public function profile ($id)
    {
        $guru = Guru::find($id);
        return view('guru.profile', compact('guru'));
    }
}
