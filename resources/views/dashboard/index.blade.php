@extends('layouts.master')

@section('content')
{{-- <div class="main">
    <div class="main-content">
        <div class="container-fluid"> --}}
            <div class="row-12" >
                <div class="col-md-6" style="margin-top:30px;">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="margin-top:10px;"><b>Ranking</b></h3>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>NILAI</th>
                                        <th>RANKING</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rank = 1;
                                    @endphp
                                    @foreach (ranking5Besar() as $s)
                                    <tr>
                                        <td>{{$s->nama_lengkap()}}</td>
                                        <td>{{$s->rataRataNilai()}}</td>
                                        <td>{{$rank}}</td>
                                    </tr>
                                    @php
                                        $rank++
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" style="margin-top:30px;">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-users"></i></span>
                        <p>
                            <span class="number"><b>{{totalSiswa()}}</b></span>
                            <span class="title">Total Siswa</span>
                        </p>
                    </div>
                </div>
                
                <div class="col-md-3" style="margin-top:30px;">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number"><b>{{totalGuru()}}</b></span>
                            <span class="title">Total Guru</span>
                        </p>
                    </div>
                </div>
            </div>
        {{-- </div>
    </div>
</div> --}}
@stop