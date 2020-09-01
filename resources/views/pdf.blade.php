<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
		<h5>Laporan Keuangan</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Pembeli</th>
				<th>Jenis Barang</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
				<th>Harga Satuan</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
                        @php $no = 1; $alltotal = 0; @endphp
                        @foreach($data as $datas)
                        <tr>
                          <th scope="row">{{ $no++ }}</th>
                          <td>{{ $datas->pembeli }}</td>
                          <td>{{ $datas->jenis }}</td>
                          <td>{{ $datas->nama }}</td>
                          <td>{{ $datas->jumlah }}</td>
                          <td>Rp. {{ format_uang($datas->harga) }}</td>
                          <td>@if($datas->jenis == 'gadai sawah')
                                @php $total = $datas->harga; @endphp 
                                Rp. {{ format_uang($total) }} 
                              @else 
                                @php $total = $datas->harga * $datas->jumlah; @endphp 
                                Rp. {{ format_uang($total) }}
                              @endif
                          </td>
                        </tr>
                        @php $alltotal = $alltotal + $total; @endphp
                        @endforeach
                        <tr>
                          <td colspan="6" align="center"><b>Total</b></td>
                          <td><b>Rp. {{ format_uang($alltotal) }}</b></td>
                        </tr>
                      </tbody>
	</table>
 
</body>
</html>