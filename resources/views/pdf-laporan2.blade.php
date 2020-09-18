<!DOCTYPE html>
<html>
<head>
	<title>Galung App</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Keuangan Gabah & Sawah {{$bln .' '. $thn}} </h5>
	</center>
 
	<table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama pembeli</th>
                          <th>Jenis</th>
                          <th>Nama barang</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $datas)
                        <tr class="table-secondary">
                          <td>{{$no++}}</td>
                          <td>{{$datas->pembeli}}</td>
                          <td>{{$datas->jenis}}</td>
                          <td>{{$datas->nama}}</td>
                          @if($datas->jenis == 'gadai sawah')
                            <td>{{$datas->jumlah}}</td>
                            <td>Rp. {{format_uang($datas->harga)}}</td>
                            <td>Rp. {{format_uang($datas->harga)}}</td>
                          @else
                            <td>{{$datas->jumlah}} Kg</td>
                            <td>Rp. {{format_uang($datas->harga)}}</td>
                            <td>Rp. {{format_uang($datas->harga * $datas->jumlah)}}</td>
                          @endif
                          
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
 
</body>
</html>