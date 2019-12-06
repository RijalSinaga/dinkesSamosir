@extends('layouts._dashboard')

@section('dashboard')
{{-- <div class="main">
    <div class="main-content">
        <div class="container-fluid"> --}}
            <div class="row" >
                <div class="col-md-6" style="margin-top:30px;">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="margin-top:20px;">Ranking</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-striped">
                                <thead class="adadeh">
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
            </div>
        {{-- </div>
    </div>
</div> --}}
@stop