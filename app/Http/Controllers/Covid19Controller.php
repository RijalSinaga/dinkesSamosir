<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Covid19;
use App\Exports\covid19Export;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Covid19Controller extends Controller
{
    Public function index (Request $request)
    {
        if($request->ajax())
        {
            $data_covid19 = covid19/index::latest()->get();
            return DataTables::of($data_covid19)
            ->addColumn('action', function($data_covid19){
                $button = '<button type="button" name="edit" id="'.$data_covid19->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data_covid19->id.'" class="delete btn btn-danger btn-sm">Edit</button>';
                return $button;
                
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $data_covid19 = \App\covid19::all();
        return view('covid19.index', ['data_covid19'=>$data_covid19]);
    }

    Public function create (Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'puskesmas' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'swab_test' => 'required',
            'rapid_test' => 'required',
            'avatar' => 'mimes:jpeg,png',
        ]);
        
        // insert ke table User
        // dd($request->all());
        $user = new \App\User;
        $user->role = 'surveilans';
        $user->name = $request->puskesmas;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();
        
        // insert ke table covid19
        $request->request->add(['user_id' => $user->id]);
        $covid19 = \App\covid19::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $covid19->avatar = $request->file('avatar')->getClientOriginalName();
            $covid19->save();
        }
        return redirect('/covid19')->with('success','Data success added!!');
    }
    
    Public function edit ($id)
    {
        $covid19 = \App\covid19::find($id);
        return view('covid19.edit', compact('covid19'));
    }
    
    Public function update (Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request,[
            'puskesmas' => 'required|min:5',
            // 'email' => 'disabled',
            'swab_test' => 'required',
            'rapid_test' => 'required',
            // 'agama' => 'required',
            'avatar' => 'mimes:jpeg,png',
        ]);
        
        $covid19 = \App\covid19::find($id);
        $covid19 -> update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $covid19->avatar = $request->file('avatar')->getClientOriginalName();
            $covid19->save();
        }
        return redirect('covid19/'.$id.'/profile')->with('success','Data success Updated!!');
    }
    
    Public function delete ($id)
    {
        $covid19 = \App\covid19::find($id);
        $covid19->delete();
        return redirect('covid19')->with('success','Data success Deleted!!');
    }

    Public function profile($id)
    {
        $covid19 = \App\Covid19::find($id);
        $puskesmas = \App\Puskesmas::all();
        $test = \App\Test::all();

        // Menyiapkan data untuk CHART
        $categories = [];
        $data = [];

        foreach($puskesmas as $pkm){
            if($covid19->test()->wherePivot('test_id',$pkm->id)->first()){
                $categories[] = $pkm->nama;
                $data[] = $covid19->test()->wherePivot('test_id',$pkm->id)->first()->pivot->jlh;
            }
        }
        // dd($categories);

        // return view('siswa.profile', compact(['siswa', 'matapelajaran', 'categories', 'data']));
        return view('covid19.profile',['covid19' => $covid19, 'puskesmas' =>$puskesmas, 'categories' => $categories,'data' => $data]);
    }
    
    Public function addjlh (Request $request,$idcovid19)
    {
        // dd($request->all());
        $covid19 = \App\covid19::find($idcovid19);
        if($covid19->test()->where('test_id', $request->test)->exists()){
            return redirect ('covid19/'.$idcovid19.'/profile')->with('error','Data Mata Pelajaran sudah ada!!');
        }
        $covid19->test()->attach($request->test,['test_id' => $request->id]);

        return redirect ('covid19/'.$idcovid19.'/profile')->with('success','Data success updated!!');
    }
    
    // Public function deletenilai ($idcovid19,$idmapel)
    // {
    //     $covid19 = \App\covid19::find($idcovid19);
    //     $covid19->mapel()->detach($idmapel);
    //     return redirect()->back()->with('success','Data nilai berhasil dihapus');
    // }
    
    public function exportExcel() 
    {
        return Excel::download(new covid19Export, 'covid19.xlsx');
    }

    Public function exportPdf()
    {
        $covid19 = covid19::all();
        $pdf = PDF::loadView('export.covid19Pdf', compact('covid19'));
        return $pdf->download('covid19.pdf'); //->with('success','Data success Deleted!!');;
    }
}
