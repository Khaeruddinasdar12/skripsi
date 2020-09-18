<table>
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama pembeli</th>
                          <th>Jenis</th>
                          <th>Nama barang</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php $no = 1; $total = 0;@endphp
                        @foreach($data as $datas)
                        <tr class="table">
                          <td>{{$no++}}</td>
                          <td>{{$datas->pembeli}}</td>
                          <td>{{$datas->jenis}}</td>
                          <td>{{$datas->nama}}</td>
                          @if($datas->jenis == 'gadai sawah')
                            @php $total = $total + $datas->harga; @endphp
                            <td>{{$datas->jumlah}}</td>
                            <td>Rp. {{format_uang($datas->harga)}}</td>
                            <td>Rp. {{format_uang($datas->harga)}}</td>
                          @else
                            @php $total = $total + ($datas->harga * $datas->jumlah); @endphp
                            <td>{{$datas->jumlah}} Kg</td>
                            <td>Rp. {{format_uang($datas->harga)}}</td>
                            <td>Rp. {{format_uang($datas->harga * $datas->jumlah)}}</td>
                          @endif
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="6">Total</td>
                          <td>Rp. {{format_uang($total)}}</td>
                        </tr>
                      </tbody>
                    </table>