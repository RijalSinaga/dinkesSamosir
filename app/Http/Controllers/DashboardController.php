<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
} 
