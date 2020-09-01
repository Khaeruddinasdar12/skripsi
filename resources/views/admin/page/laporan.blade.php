@extends('layouts.galungtemplate')

@section('content')
<div class="kt-container">
  <div class="row justify-content-center">
    <!-- alert section -->
      @include('admin.page.alert')
      <!-- end alert section -->
<div class="col-md-12">

<div class="alert alert-custom alert-outline-dark fade show mb-2" role="alert">
    <div class="alert-icon"><i class="flaticon-info"></i></div>
    <div class="alert-text">Tekan tombol Reload terlebih dahulu sebelum convert PDF atau Excel</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="flaticon-close"></i></span>
        </button>
    </div>
</div>
          <div class="kt-portlet admin-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
	                <span class="kt-portlet__head-icon">
	                  <i class="flaticon-file-1"></i>
	                </span>
	                <h3 class="kt-portlet__head-title">
	                  Laporan Keuangan
	                </h3>&nbsp;
	                <form accept="{{route('index.laporan')}}" method="get">
                        <select class="form-control-sm" name="jumlah">
                          <option value="100" @if(Request::get('jumlah') == '100') {{"selected"}} @endif>100</option>
                          <option value="50" @if(Request::get('jumlah') == '50') {{"selected"}} @endif>50</option>
                          <option value="10" @if(Request::get('jumlah') == '10') {{"selected"}} @endif>10</option>
                        </select>

	                			<select class="form-control-sm" name="transaksi">
	                				<option value="">pilih transaksi</option>
				                	<option value="alat" @if(Request::get('transaksi') == 'alat') {{"selected"}} @endif >Transaksi Alat</option>
				                	<option value="beras" @if(Request::get('transaksi') == 'beras') {{"selected"}} @endif>Transaksi Beras</option>
				                	<option value="bibit" @if(Request::get('transaksi') == 'bibit') {{"selected"}} @endif>Transaksi Bibit</option>
				                	<option value="pupuk" @if(Request::get('transaksi') == 'pupuk') {{"selected"}} @endif>Transaksi Pupuk</option>
				                	<option value="gabah" @if(Request::get('transaksi') == 'gabah') {{"selected"}} @endif>Transaksi Gabah</option>
				                	<option value="gs" @if(Request::get('transaksi') == 'gs') {{"selected"}} @endif>Transaksi Gadai Sawah</option>

				                </select>
				                <select class="form-control-sm" name="tahun">
				                	<option value="">pilih tahun</option>
                          @foreach($tahun as $tahuns)
				                	 <option value="{{$tahuns->year}}"  @if(Request::get('tahun') == $tahuns->year) {{"selected"}} @endif > {{$tahuns->year}} </option>
                          @endforeach
				                </select>
				                <select class="form-control-sm" name="bulan">
				                	<option value="">pilih bulan</option>
				                    <option value="1" @if(Request::get('bulan') == '1') {{"selected"}} @endif>Januari</option>
				                    <option value="2" @if(Request::get('bulan') == '2') {{"selected"}} @endif>Februari</option>
				                    <option value="3" @if(Request::get('bulan') == '3') {{"selected"}} @endif>Maret</option>
				                    <option value="4" @if(Request::get('bulan') == '4') {{"selected"}} @endif>April</option>
				                    <option value="5" @if(Request::get('bulan') == '5') {{"selected"}} @endif >Mei</option>
				                    <option value="6" @if(Request::get('bulan') == '6') {{"selected"}} @endif>Juni</option>
				                    <option value="7" @if(Request::get('bulan') == '7') {{"selected"}} @endif>Juli</option>
				                    <option value="8" @if(Request::get('bulan') == '8') {{"selected"}} @endif>Agustus</option>
				                    <option value="9" @if(Request::get('bulan') == '9') {{"selected"}} @endif>September</option>
				                    <option value="10" @if(Request::get('bulan') == '10') {{"selected"}} @endif>Oktober</option>
				                    <option value="11" @if(Request::get('bulan') == '11') {{"selected"}} @endif>November</option>
				                    <option value="12" @if(Request::get('bulan') == '12') {{"selected"}} @endif>Desember</option>
				                </select>
				                <button type="submit" class="btn btn-outline-primary btn-sm mr-2"> 
				                	<i class="fas fa-sync-alt"></i>Reload
				                </button>
				    			</form>

                        <form action="{{route('pdf.laporan')}}" method="get">
                          <input type="hidden" name="bulan" value="{{Request::get('bulan')}}">
                          <input type="hidden" name="transaksi" value="{{Request::get('transaksi')}}">
                          <input type="hidden" name="tahun" value="{{Request::get('tahun')}}">
                          <input type="hidden" name="jenis" value="pdf">
  				    			      <button type="submit" class="btn btn-outline-danger btn-sm">
  				                   <i class="fas fa-file-pdf"></i> PDF
  				                </button>
                        </form>
                        &nbsp;
				                <form>
                          <input type="hidden" name="bulan" value="{{Request::get('bulan')}}">
                          <input type="hidden" name="transaksi" value="{{Request::get('transaksi')}}">
                          <input type="hidden" name="tahun" value="{{Request::get('tahun')}}">
                          <input type="hidden" name="jenis" value="excel">
  				                <button class="btn btn-outline-success btn-sm">
  				                    <i class="fas fa-file-excel"></i> Excel
  				                </button>
                        </form>
				        

	              </div>
	              
            	
            </div>
            <div class="kt-portlet__body">
              <div class="kt-section">
                <div class="kt-section__content">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
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
                      {{$data->links()}}
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </div>
</div>
@endsection