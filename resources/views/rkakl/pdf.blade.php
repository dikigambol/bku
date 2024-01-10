<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  padding: 8px;
  font-size: 12px;
}

.text-right{
  text-align: right;
}

</style>
</head>
<body onload="window.print();">

<center><h2 class="card-text text-uppercase my-0">Kementrian kelautan dan perikanan | Ditjen Perikanan tangkap</h2></center>
<table id="tableM" data-toggle="table" data-sticky-header="true" data-click-to-select="true" data-filter-control="true" data-toolbar="#toolbar" data-buttons="buttons" data-search="true">
  <thead>
      <tr>
          <th data-field="state">No</th>
          <th data-field="kode">Kode</th>
          <th data-field="desc">Deskripsi</th>
          <th data-field="vol">Volume</th>
          <th data-field="harga">Harga Satuan</th>
          <th data-field="jumlah">Pagu</th>
          <th data-field="realisasi">Realisasi</th>
          <th data-field="sisa">Sisa</th>
          <th data-field="pengajuan">Pengajuan</th>
      </tr>
  </thead>
  <tbody>
      @if (!empty($rkaklAll))
      @foreach ($rkaklAll as $rk)
      <tr>
          <td>{{$loop->iteration}}</td>
          {{-- <td>{{$rk['hie8']}}</td> --}}
          <td>{{$rk['kode']}}</td>
          <td>{{$rk['desc']}}</td>
          <td class="text-right">{{$rk['vol']}}</td>
          <td class="text-right"><?= $rk['harga'] != '' ? number_format($rk['harga'], 0, ',', '.') : '-' ?></td>
          <td class="text-right"><?= $rk['jumlah'] != '' ? number_format($rk['jumlah'], 0, ',', '.') : '-' ?></td>
          <td class="text-right"><?= $rk['realisasi'] != '' ? number_format($rk['realisasi'], 0, ',', '.') : '-' ?></td>
          <td class="text-right">
            @php
              $real = $rk['realisasi'] != '' ? $rk['realisasi'] : 0;
              $aju = $rk['pengajuan'] != '' ? $rk['pengajuan'] : 0;
              $sum = $rk['jumlah'] != '' ? $rk['jumlah'] : 0;
              $sisa = $sum - ($real + $aju);
              // $sisa != '' ? $sisa
            @endphp
            <?= $sisa != '' ? number_format($sisa, 0, ',', '.') : '-'?>
          </td>
          <td class="text-right"><?= $rk['pengajuan'] != '' ? number_format($rk['pengajuan'], 0, ',', '.') : '-' ?></td>
      </tr>
      @endforeach
      @endif
  </tbody>
</table>


</body>
</html>

