<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KominfoController extends Controller
{
    // Public function index(Request $request)
    // {
    //     return view('kominfo.pegawai.index');
    // }

    Public function index (Request $request)
    {
        if($request->ajax())
        {
            $data_pegawai = pegawai/index::latest()->get();
            return DataTables::of($data_pegawai)
            ->addColumn('action', function($data_pegawai){
                $button = '<button type="button" name="edit" id="'.$data_pegawai->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data_pegawai->id.'" class="delete btn btn-danger btn-sm">Edit</button>';
                return $button;
                
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $data_pegawai = \App\pegawai::all();
        return view('kominfo.pegawai.index', ['data_pegawai'=>$data_pegawai]);
    }
}
