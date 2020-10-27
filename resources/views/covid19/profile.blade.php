@extends('layouts.master')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section('content')

<div class="row">
<div class="row">
    <div class="col-lg-12">
    <div class="main-content">
            <div class="container-fluid">

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif

                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="{{$covid19->getAvatar()}}" width="100px" height="100px" class="img-circle" alt="Avatar">
                                <h3 class="name">{{$covid19->puskesmas}}</h3>
                                    <span class="online-status status-available">Available</span>
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-4 stat-item">
                                            {{$covid19->test->count()}} <span>Swab-Test</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            <span>Rapid-Test</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            Total <span>--</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Profile</h4>
                                    <ul class="list-unstyled list-justify">
                                        {{-- <li>Demografi <span>{{$covid19->jenis_kelamin}}</span></li>
                                        <li>Jumlah Penduduk <span>{{$covid19->agama}}</span></li>
                                        <li>Alamat <span>{{$covid19->alamat}}</span></li> --}}
                                    </ul>
                                </div>
                            <div class="text-center"><a href="/covid19/{{$covid19->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah
                            </button><hr>

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Covid19</h3>
                            </div>
                            <div class="panel-body">
        						<table class="table table-hover table-striped">
        							<thead>
        								<tr>
        									<th>Puskesmas</th>
        									<th>Swab Test</th>
        									<th>Rapid Test</th>
        									<th>Jumlah</th>
        									<th>Action</th>
        								</tr>
        							</thead>
        							<tbody>
                                        @foreach ($covid19->test as $test)
                                        <tr>
                                            <td>{{$test->nama}}</td>
                                            <td>{{$test->alamat}}</td>
                                            <td>{{$test->jlh}}</td>
                                            {{-- <td>{{$puskesmas->semester}}</td> --}}
                                            {{-- <td><a href="/guru/{{$puskesmas->guru_id}}/profile">{{$puskesmas->guru->nama}}</a></td> --}}
                                        {{-- <a href="#" id="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/post" data-title="masukkan nilai">{{$mapel->pivot->nilai}}</a> --}}
                                            <td>
                                                <a href="#" class="jlh" data-type="text" data-pk="{{$test->id}}" data-url="/api/siswa/{{$covid19->id}}/editnilai" data-title="Masukkan nilai">{{$test->pivot->nilai}}</a>
                                            </td>
                                        <td><a href="/covid19/{{$covid19->id}}/{{$test->id}}/deletenilai" class="btn btn-danger btn-sm" onclick="return confirm('Yakin {{$covid19->nama_depan}} {{$covid19->nama_belakang}} mau dihapus..!!')">Del</a></td>
                                        </tr>
                                    @endforeach
        							</tbody>
        						</table>
        					</div>
                            </div><hr>
                            
                            <div class="panel">
                                <div id="chartNilai"></div>
                            </div>
                        </div>
                            <!-- END TABBED CONTENT -->
                        </div>
                        <!-- END RIGHT COLUMN -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLable">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/covid19/{{$covid19->id}}/addjlh" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="test">Puskesmas</label>
                        <select name="test" id="test" class="form-control">
                            @foreach ($puskesmas as $pkm)
                            <option value="{{$pkm->id}}">{{$pkm->nama}}</option>
                            @endforeach
                        </select>
                        {{-- {{ dd($test) }} --}}
                    </div>
                        <div class="form-group {{$errors->has('nilai') ? ' has-error' : ''}}">
                            <label for="exampleInputEmail1">Nilai</label>
                            <input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="{{old('nilai')}}">
                                @if($errors->has('nilai'))
                                    <span class="help-block">{{$errors->has('nilai')}}</span>
                                @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="{{asset('profile/highcharts/code/highcharts.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
    Highcharts.chart('chartNilai', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Covid19'
        },
        xAxis: {
            categories: {!!json_encode($categories)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Trend'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah',
            data: {!!json_encode($data)!!}
        }]
    });
    
    $(document).ready(function() {
        $('.jlh').editable();
    });
    
</script>
@stop
