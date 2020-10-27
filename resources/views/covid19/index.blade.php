@extends('layouts.master')

@section('content')

{{-- <div class="main"> --}}
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="panel-title">Data Tracing Covid19</h1>
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
                                            <th>Puskesmas</th>
                                            <th>Swab-Test</th>
                                            <th>Rapid-Test</th>
                                            <th>action</th>		
                                        </tr>
                                    </thead>
                                    @foreach ($data_covid19 as $covid19)
                                    
                                    <tbody>
                                    <tr>
                                        <td> <a href="/covid19/{{$covid19->id}}/profile"> {{$covid19->puskesmas}}</a></td>
                                        <td> <a href="/covid19/{{$covid19->id}}/profile"> {{$covid19->swab_test}}</a></td>
                                        <td> <a href="/covid19/{{$covid19->id}}/profile"> {{$covid19->rapid_test}}</a></td>
                                        {{-- <td align="center">{{$covid19->jenis_kelamin}}</td>
                                        <td>{{$covid19->agama}}</td>
                                        <td>{{$covid19->alamat}}</td>
                                        <td align="center">{{$covid19->rataRataNilai()}}</td> --}}
                                        <td align="center">
                                            <a href="/covid19/{{$covid19->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm delete" covid19-id="{{$covid19->id}}">Del</a>
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
        <h5 class="modal-title" id="exampleModalLongTitle"><span><h1><b>Input Data Tracing</b></h1></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/covid19/create" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group {{$errors->has('puskesmas') ? ' has-error' : ''}}">
                {{-- <label for="exampleInputEmail1">Nama Depan</label> --}}
                <input name="puskesmas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Puskesmas" value="{{old('puskesmas')}}">
                    @if($errors->has('puskesmas'))
                        <span class="help-block">{{$errors->has('puskesmas')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                {{-- <label for="exampleInputEmail1">Email</label> --}}
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                @if($errors->has('puskesmas'))
                    <span class="help-block">{{$errors->has('email')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('puskesmas') ? ' has-error' : ''}}">
                {{-- <label for="exampleInputEmail1">Nama Depan</label> --}}
                <input name="swab_test" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Swab Test" value="{{old('swab_test')}}">
                    @if($errors->has('swab_test'))
                        <span class="help-block">{{$errors->has('swab_test')}}</span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('puskemas') ? ' has-error' : ''}}">
                {{-- <label for="exampleInputEmail1">Nama Depan</label> --}}
                <input name="rapid_test" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rapid Test" value="{{old('rapid_test')}}">
                    @if($errors->has('rapid_test'))
                        <span class="help-block">{{$errors->has('rapid_test')}}</span>
                    @endif
            </div>

            

            <div class="form-group {{$errors->has('avatar') ? ' has-error' : ''}}">
                {{-- <label for="exampleFormControlTextarea1">Avatar</label> --}}
                <input type="file" name="avatar" class="form-control">
                @if($errors->has('puskesmas'))
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

@stop

@section('footer')
    <script>
        $('.delete').click(function(){
            var siswa_id = $(this).attr('covid19-id');
            swal({
            title: "Anda yakin?",
            text: "Hapus Data dengan id "+covid19_id+"!",
            icon: "danger",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            // console.log(willDelete)
            if (willDelete) {
                window.location = "/covid19/"+covid19_id+"/delete";
            }
            });
        });
    </script>
@endsection




