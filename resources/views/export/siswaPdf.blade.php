<style>
  @page { size: A4 }

  h1 {
      font-weight: bold;
      font-size: 20pt;
      text-align: center;
  }

  table {
      border-collapse: collapse;
      width: 100%;
  }

  .table th {
      padding: 8px 8px;
      border:1px solid #000000;
      text-align: center;
  }

  .table td {
      padding: 3px 3px;
      border:1px solid #000000;
  }

  .text-center {
      text-align: center;
  }
</style>
<h1>Daftar Nilai Siswa</h1>
<table class="table" style="border:1px solid #000">
  <thead>
    <tr>
        <th>NO</th>
        <th>NAMA LENGKAP</th>
        <th>JENIS KELAMIN</th>
        <th>AGAMA</th>
        <th>RATA-RATA NILAI</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no=1;
    @endphp
    @foreach ($siswa as $s)
    <tr>
      <td class="text-center">{{$no++}}</td>
      <td>{{$s->nama_lengkap()}}</td>
      <td class="text-center">{{$s->jenis_kelamin}}</td>
      <td class="text-center">{{$s->agama}}</td>
      <td class="text-center">{{$s->rataRataNilai()}}</td>
    </tr>
    @endforeach
  </tbody>
</table>