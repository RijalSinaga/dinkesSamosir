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
                      <h1 class="panel-title"><b>Data Covid19</b></h1>
                    </div>
                          <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                          <form action="/covid19/{{$covid19->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                  <div class="form-group {{$errors->has('puskesmas') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Puskesmas</label>
                                  <input name="puskesmas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Puskesmas"  value="{{$covid19->puskesmas}}">
                                    @if($errors->has('puskesmas'))
                                      <span class="help-block">{{$errors->has('puskesmas')}}</span>
                                    @endif
                                  </div>
                                  <div class="form-group {{$errors->has('swab_test') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Swab-Test</label>
                                  <input name="swab_test" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jumlah di Swab-Test"  value="{{$covid19->swab_test}}">
                                    @if($errors->has('swab_test'))
                                      <span class="help-block">{{$errors->has('swab_test')}}</span>
                                    @endif
                                  </div>
                                  <div class="form-group {{$errors->has('rapid_test') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Rapid-Test</label>
                                  <input name="rapid_test" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jumlah di Rapid-test"  value="{{$covid19->rapid_test}}">
                                    @if($errors->has('rapid_test'))
                                      <span class="help-block">{{$errors->has('rapid_test')}}</span>
                                    @endif
                                  </div>

                                  {{-- <div class="form-group {{$errors->has('nama_belakang') ? ' has-error' : ''}}">
                                      <label for="exampleInputEmail1">Nama Belakang</label>
                                      <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$covid19->nama_belakang}}">
                                      @if($errors->has('nama_belakang'))
                                        <span class="help-block">{{$errors->has('nama_belakang')}}</span>
                                      @endif
                                    </div>
                                  <div class="form-group {{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" type="text" class="form-control" id="exampleFormControlSelect1">
                                      <option value="L" @if($covid19->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                      <option value="P" @if($covid19->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>  
                                  </div>
                                  <div class="form-group {{$errors->has('agama') ? ' has-error' : ''}}">
                                    <label for="exampleFormControlSelect1">Agama</label>
                                    <select name="agama" type="text" class="form-control" id="exampleFormControlSelect1">
                                      <option value="Islam" @if($covid19->agama == 'Islam') selected @endif>Islam</option>
                                      <option value="Kristen" @if($covid19->agama == 'Kriten') selected @endif>Kristen</option>
                                      <option value="Katolik" @if($covid19->agama == 'Katolik') selected @endif>Katolik</option>
                                      <option value="Budha" @if($covid19->agama == 'Budha') selected @endif>Budha</option>
                                      <option value="Hindu" @if($covid19->agama == 'Hindu') selected @endif>Hindu</option>
                                    </select>  
                                  </div>
                                  <div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="2" >{{$covid19->alamat}}</textarea>
                                  </div>
                                  <div class="form-group {{$errors->has('avatar') ? ' has-error' : ''}}">
                                      <label for="exampleFormControlTextarea1">Avatar</label>
                                      <input type="file" name="avatar" class="form-control">
                                      @if($errors->has('avatar'))
                                        <span class="help-block">{{$errors->has('avatar')}}</span>
                                      @endif
                                  </div> --}}
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
