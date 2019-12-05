<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Siswa;

class SiswaController extends Controller
{
    Public function index (Request $request)
    {
        if($request->ajax())
        {
            $data_siswa = siswa/index::latest()->get();
            return DataTables::of($data_siswa)
            ->addColumn('action', function($data_siswa){
                $button = '<button type="button" name="edit" id="'.$data_siswa->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data_siswa->id.'" class="delete btn btn-danger btn-sm">Edit</button>';
                return $button;
                
            })
            ->rawColumns(['action'])
            ->make(true);
        }


        $data_siswa = \App\siswa::all();
        return view('siswa.index', ['data_siswa'=>$data_siswa]);
    }

    Public function create (Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpeg,png',
        ]);
        
        // insert ke table User
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();
        
        // insert ke table Siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('success','Data success added!!');
    }
    
    Public function edit ($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }
    
    Public function update (Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            // 'email' => 'disabled',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpeg,png',
        ]);
        
        $siswa = \App\Siswa::find($id);
        $siswa -> update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('siswa/'.$id.'/profile')->with('success','Data success Updated!!');
    }
    
    Public function delete ($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete();
        return redirect('siswa')->with('success','Data success Deleted!!');
    }

    Public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();

        // Menyiapkan data untuk CHART
        $categories = [];
        $data = [];

        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }
        }
        // dd($categories);

        // return view('siswa.profile', compact(['siswa', 'matapelajaran', 'categories', 'data']));
        return view('siswa.profile',['siswa' => $siswa, 'matapelajaran' =>$matapelajaran, 'categories' => $categories,'data' => $data]);
    }
    
    Public function addnilai (Request $request,$idsiswa)
    {
        // dd($request->all());
        $siswa = \App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id', $request->mapel)->exists()){
            return redirect ('siswa/'.$idsiswa.'/profile')->with('error','Data Mata Pelajaran sudah ada!!');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect ('siswa/'.$idsiswa.'/profile')->with('success','Data success updated!!');
    }
}
