<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    Public function editnilai(Request $request, $id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk,['nilai' => $request->value]);
    }
}
