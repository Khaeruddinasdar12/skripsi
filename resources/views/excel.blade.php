                    <table>
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Pembeli</th>
                          <th>Jenis Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Harga Satuan</th>
                          <th>Tanggal</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; $alltotal = 0; @endphp
                        @foreach($data as $datas)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $datas->pembeli }}</td>
                          <td>{{ $datas->jenis }}</td>
                          <td>{{ $datas->nama }}</td>
                          <td>{{ $datas->jumlah }}</td>
                          <td>Rp. {{ format_uang($datas->harga) }}</td>
                          <td>{{$datas->created_at}}</td>
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
                          <td colspan="7" align="center"><b>Total</b></td>
                          <td><b>Rp. {{ format_uang($alltotal) }}</b></td>
                        </tr>
                      </tbody>
                    </table>