@extends('layouts.master')

@section('content')

{{-- <div class="main"> --}}
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="panel-title">Data Siswa</h1>
                                <div class="right col-lg-3">
                                    <a href="/siswa/exportExcel" class="btn btn-primary btn-sm float">Print EXCEL</a>
                                    <a href="/siswa/exportPdf" class="btn btn-success btn-sm">Print PDF</a>
                                    <div class="right">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalLong"><i class="lnr lnr-plus-circle"></i></button>

                                    </div>
                                </div>
                            <div>
                            </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>Nama Depan</th>
                                            <th>Nama Belakang</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Nilai</th>
                                            <th>action</th>		
                                        </tr>
                                    </thead>
                                    @foreach ($data_siswa as $siswa)
                                    
                                    <tbody>
                                    <tr>
                                        <td> <a href="/siswa/{{$siswa->id}}/profile"> {{$siswa->nama_depan}}</a></td>
                                        <td> <a href="/siswa/{{$siswa->id}}/profile"> {{$siswa->nama_belakang}}</a></td>
                                        <td align="center">{{$siswa->jenis_kelamin}}</td>
                                        <td>{{$siswa->agama}}</td>
                                        <td>{{$siswa->alamat}}</td>
                                        <td align="center">{{$siswa->rataRataNilai()}}</td>
                                        <td align="center">
                                            <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin {{$siswa->nama_depan}} {{$siswa->nama_belakang}} mau dihapus..!!')">Del</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}

<div class="row">
    <div class="col-6">
        {{-- <h1>DATA SISWA</h1> --}}
    </div>

    <div class="col-6">
    <!-- Button trigger modal -->
        
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><span><h1><b>Input Data Siswa</b></h1></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/siswa/create" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group {{$errors->has('nama_depan') ? ' has-error' : ''}}">
                {{-- <label for="exampleInputEmail1">Nama Depan</label> --}}
                <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                    @if($errors->has('nama_depan'))
                        <span class="help-block">{{$errors->has('nama_depan')}}</span>
                    @endif
            </div>

            <div class="form-group {{$errors->has('nama_belakang') ? ' has-error' : ''}}">
                {{-- <label for="exampleInputEmail1">Nama Belakang</label> --}}
                <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                @if($errors->has('nama_depan'))
                    <span class="help-block">{{$errors->has('nama_belakang')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                {{-- <label for="exampleInputEmail1">Email</label> --}}
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                @if($errors->has('nama_depan'))
                    <span class="help-block">{{$errors->has('email')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                {{-- <label for="exampleFormControlSelect1">Jenis Kelamin</label> --}}
                <select name="jenis_kelamin" type="text" class="form-control" id="exampleFormControlSelect1">
                    <option value="#">--Pilih Jenis Kelamin--</option>
                    <option value="L" {{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
                    <option value="P" {{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                </select>  
            </div>

            <div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
                {{-- <label for="exampleFormControlSelect1">Agama</label> --}}
                <select name="agama" type="text" class="form-control" id="exampleFormControlSelect1">
                    <option value="#">--Pilih Agama--</option>
                    <option value="Islam" {{(old('agama') == 'Islam') ? ' selected' : ''}}>Islam</option>
                    <option value="Kristen" {{(old('agama') == 'Kristen') ? ' selected' : ''}}>Kristen</option>
                    <option value="Katolik" {{(old('agama') == 'Katolik') ? ' selected' : ''}}>Katolik</option>
                    <option value="Budha" {{(old('agama') == 'Budha') ? ' selected' : ''}}>Budha</option>
                    <option value="Hindu" {{(old('agama') == 'Hindu') ? ' selected' : ''}}>Hindu</option>
                </select>  
            </div>

            <div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
                {{-- <label for="exampleFormControlTextarea1">Alamat</label> --}}
                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" placeholder="Alamat" rows="2">{{old('alamat')}}</textarea>
            </div>

            <div class="form-group {{$errors->has('avatar') ? ' has-error' : ''}}">
                {{-- <label for="exampleFormControlTextarea1">Avatar</label> --}}
                <input type="file" name="avatar" class="form-control">
                @if($errors->has('nama_depan'))
                        <span class="help-block">{{$errors->has('avatar')}}</span>
                @endif
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        </div>
    </div>
</div>

@endsection




