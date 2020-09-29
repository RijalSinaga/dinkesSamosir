@extends('layouts.master')

@section('content')

    @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{session('success')}}
    </div>
    @endif
    <div class="main-content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading">
                      <h1 class="panel-title"><b>Data Siswa</b></h1>
                    </div>
                          <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                          <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                  <div class="form-group {{$errors->has('nama_depan') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Nama Depan</label>
                                  <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan"  value="{{$siswa->nama_depan}}">
                                    @if($errors->has('nama_depan'))
                                      <span class="help-block">{{$errors->has('nama_depan')}}</span>
                                    @endif
                                  </div>
                                  <div class="form-group {{$errors->has('nama_belakang') ? ' has-error' : ''}}">
                                      <label for="exampleInputEmail1">Nama Belakang</label>
                                      <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                                      @if($errors->has('nama_belakang'))
                                        <span class="help-block">{{$errors->has('nama_belakang')}}</span>
                                      @endif
                                    </div>
                                  <div class="form-group {{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" type="text" class="form-control" id="exampleFormControlSelect1">
                                      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>  
                                  </div>
                                  <div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
                                    <label for="exampleFormControlSelect1">Agama</label>
                                    <select name="agama" type="text" class="form-control" id="exampleFormControlSelect1">
                                      <option value="Islam" @if($siswa->agama == 'Islam') selected @endif>Islam</option>
                                      <option value="Kristen" @if($siswa->agama == 'Kriten') selected @endif>Kristen</option>
                                      <option value="Katolik" @if($siswa->agama == 'Katolik') selected @endif>Katolik</option>
                                      <option value="Budha" @if($siswa->agama == 'Budha') selected @endif>Budha</option>
                                      <option value="Hindu" @if($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                    </select>  
                                  </div>
                                  <div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="2" >{{$siswa->alamat}}</textarea>
                                  </div>
                                  <div class="form-group {{$errors->has('avatar') ? ' has-error' : ''}}">
                                      <label for="exampleFormControlTextarea1">Avatar</label>
                                      <input type="file" name="avatar" class="form-control">
                                      @if($errors->has('avatar'))
                                        <span class="help-block">{{$errors->has('avatar')}}</span>
                                      @endif
                                  </div>
                                  <div>
                                    <button type="submit" class="btn btn-warning float-md-right">Update</button>
                                  </div>
                                </form>
                                <br>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

@endsection
