@extends('layouts._dashboard')

@section('dashboard')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Biodata</h1>
    </div>
    
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
                                    <img src="" width="100px" height="120px" class="img-circle" alt="Avatar">
                                <h3 class="name">{{$guru->nama}}</h3>
                                    <span class="online-status status-available">Available</span>
                                </div>
                                <div class="profile-stat">
                                  <div class="row">
                                      <div class="col-md-4 stat-item">
                                          {{$guru->mapel->count()}} <span>Mata Pelajaran</span>
                                      </div>
                                      <div class="col-md-4 stat-item">
                                          15 <span>Awards</span>
                                      </div>
                                      <div class="col-md-4 stat-item">
                                          2174 <span>Points</span>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right">
                
                        <div class="panel">
                            <div class="panel-heading">
                            <h3 class="panel-title">Mata Pelajaran yang diajar Guru <span style="color:blue;"><b>{{$guru->nama}}</b></span></h3>
                            </div>
                            <div class="panel-body">
        						<table class="table table-hover table-striped">
        							<thead>
        								<tr>
        									<th>KODE</th>
        									<th>NAMA</th>
        									<th>SEMESTER</th>
        								</tr>
        							</thead>
        							<tbody>
                        @foreach ($guru->mapel as $mapel)
                          <tr>
                            <td>{{$mapel->kode}}</td>
                            <td>{{$mapel->nama}}</td>
                            <td>{{$mapel->semester}}</td>
                          </tr>
                        @endforeach
                        </tbody>
        						</table>
        					</div>
                                
                            </div>
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


</div>
@stop

@section('footer')

@endsection
