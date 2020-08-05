@extends('layouts.galungtemplate')

@section('content')

<div class="kt-subheader subheader-custom kt-grid__item" id="kt_subheader">
  <div class="kt-container ">
    <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
        Penjualan </h3>
      <span class="kt-subheader__separator kt-hidden"></span>
      <div class="kt-subheader__breadcrumbs">
        <a href="" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
          Beras
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
          Transaksi Beras
        </a>
      </div>
    </div>
    <div class="kt-subheader__toolbar">
      <div class="kt-subheader__wrapper">
        <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker">
          <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
          <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug
            16
          </span>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="kt-container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      @if(session('success'))
      <div data-notify="container" class="alert alert-success m-alert animated bounce alert-win" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 10000; top: 100px; left: 0px; right: 0px; animation-iteration-count: 1;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 100002;" data-notify="dismiss" data-dismiss="alert" aria-label="Close"></button>
        <span data-notify="message">{{session('success')}}!</span>
        <a href="#" target="_blank" data-notify="url"></a>
      </div>
      @elseif(session('error'))
      <div data-notify="container" class="alert alert-success m-alert animated bounce alert-error" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 10000; top: 100px; left: 0px; right: 0px; animation-iteration-count: 1;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 100002;" data-notify="dismiss" data-dismiss="alert" aria-label="Close"></button>
        <span data-notify="message">{{session('error')}}!</span>
        <a href="#" target="_blank" data-notify="url"></a>
      </div>
      @endif
      @if ($errors->any())
      <div data-notify="container" class="alert alert-success m-alert animated bounce alert-error" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 10000; top: 100px; left: 0px; right: 0px; animation-iteration-count: 1;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute
        ; right: 10px; top: 5px; z-index: 100002;" data-notify="dismiss" data-dismiss="alert" aria-label="Close"></button>
        @foreach ($errors->all() as $error)
        <span data-notify="message">{{ $error }} !</span>
        @endforeach
        <a href="#" target="_blank" data-notify="url"></a>
      </div>
      @endif

      <div class="row">
        <div class="col-md-2">
          <div class="kt-portlet sticky" data-sticky="true" data-margin-top="100px" data-sticky-for="1023" data-sticky-class="kt-sticky">
            <div class="kt-portlet__body">
              <h5 style="color: #222;">
                Jumlah Data Transaksi Beras Yang Tersedia
              </h5>
              <h4 class="mt-3 kt-font-success" style="font-weight: 800;">
                {{$jml}} Data
              </h4>

            </div>
          </div>
        </div>

        <div class="col-md-10">
          <div class="kt-portlet admin-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                  <i class="flaticon-avatar"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                  Data Transaksi Beras
                </h3>
              </div>
            </div>
            <div class="kt-portlet__body">
              <div class="kt-section">
                <div class="kt-section__content">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Pembeli</th>
                          <th>Nama / Jenis Beras</th>
                          <th>Jumlah Beras</th>
                          <th>Total Harga</th>
                          <th>Jenis Pembayaran</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      @if ($jml == 0)
                      <tbody style="text-align: center;">
                        <td colspan="7">Belum ada data</td>
                      </tbody>
                      @else
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach ($data as $transaksi)
                        @php
                        $total = (($transaksi -> jumlah)*($transaksi -> harga));
                        @endphp

                        <!-- Mengganti nama jenis bayar untuk detail -->
                        @if($transaksi->jenis_bayar == 'cod')
                        @php $pembayaran = 'Cash On Delivery (cod)'; @endphp
                        @else
                        @php $pembayaran = 'Transfer Bank'; @endphp
                        @endif
                        <!-- End Mengganti nama jenis bayar untuk detail -->
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td>{{$transaksi -> users -> name}}</td>
                          <td>{{$transaksi -> beras -> nama}}</td>
                          <td>{{$transaksi -> jumlah}} Kg</td>
                          <td>Rp.{{format_uang($total)}}</td>
                          <td>
                            @if($transaksi->jenis_bayar == 'cod')
                            Cash On Delivery
                            @else
                            <button type="button" class="btn btn-bold btn-bukti btn-sm" data-toggle="modal" data-target="#buktipembayaran"> Lihat Bukti Pembayaran</button>
                            @endif
                          </td>
                          <td>
                            <div class="dropdown dropdown-inline">
                              <a href="#" class="btn btn-default btn-icon btn-icon-md btn-sm btn-more-custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-more-1"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-table-custom fade" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 33px, 0px);">
                                <ul class="kt-nav">
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link detail-data" data-toggle="modal" data-target="#modal-detail-beras" data-id="{{$transaksi->id}}" data-jumlah="{{$transaksi->jumlah}}" data-harga="Rp.{{format_uang($transaksi->harga)}}" data-total="Rp.{{format_uang($total)}}" data-alamat="{{$transaksi->alamat}}" data-kecamatan="{{$transaksi->kecamatan}}" data-kelurahan="{{$transaksi->kelurahan}}" data-keterangan="{{$transaksi->keterangan}}" data-jenis_bayar="{{$pembayaran}}" data-users-name="{{$transaksi->users->name}}" data-beras-nama="{{$transaksi->beras->nama}}">
                                      <i class="kt-nav__link-icon flaticon2-indent-dots"></i>
                                      <span class="kt-nav__link-text">Detail</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      @endif
                    </table>
                    {{$data->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- modal buktipembayaran -->
      <div class="modal fade" id="buktipembayaran" tabindex="-1" role="dialog" aria-labelledby="modal-detail-user">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Bukti Transfer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body detail-modal" style="padding-top: 10px;">
              <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                  <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides">
                    <img src="{{ asset('img/test.JPG') }}" alt="" id="image">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- modal buktipembayaran-->

      <!-- modal detail user -->
      <div class="modal fade" id="modal-detail-beras" tabindex="-1" role="dialog" aria-labelledby="modal-detail-user">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body detail-modal">
              <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__body">

                  <!--begin::Widget -->
                  <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__head">
                      <div class="kt-widget__media">
                        <img class="kt-hidden" src="assets/media/users/100_1.jpg" alt="image">
                        <div class="kt-widget__pic kt-widget__pic--info kt-font-info kt-font-boldest  kt-hidden-">
                          A D
                        </div>
                      </div>
                      <div class="kt-widget__info">
                        <span class="kt-widget__username" id="usersnames">
                        </span>
                      </div>
                    </div>
                    <div class="kt-widget__body widget-detail">
                      <div class="kt-widget__item">
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Nama Beras Yang Dibeli :</span>
                          <span class="kt-widget__data" id="berasnamas"></span>
                        </div>

                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Jumlah Beras Yang Dibeli :</span>
                          <span class="kt-widget__data" id="jumlahs"></span>
                        </div>

                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Harga Perkilo :</span>
                          <span class="kt-widget__data" id="hargas"></span>
                        </div>

                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Total Harga :</span>
                          <span class="kt-widget__data" id="totals"></span>
                        </div>

                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Alamat :</span>
                          <span class="kt-widget__data" id="alamats"></span>
                        </div>

                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Kecamatan :</span>
                          <span class="kt-widget__data" id="kecamatans"></span>
                        </div>

                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Kelurahan :</span>
                          <span class="kt-widget__data" id="kelurahans"></span>
                        </div>

                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Jenis Bayar :</span>
                          <span class="kt-widget__data" id="jenisbayars"></span>
                        </div>

                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Keterangan :</span>
                          <span class="kt-widget__data" id="keterangans"></span>
                        </div>

                      </div>
                    </div>
                  </div>

                  <!--end::Widget -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- modal detail user -->

    </div>
  </div>
</div>

<script type="text/javascript">
  function tampilkanPreview(gambar, idpreview) {
    //membuat objek gambar
    var gb = gambar.files;
    //loop untuk merender gambar
    for (var i = 0; i < gb.length; i++) {
      //bikin variabel
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview = document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element) {
          return function(e) {
            element.src = e.target.result;
          };
        })(preview);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      } else {
        //jika tipe data tidak sesuai
        alert("Type file tidak sesuai. Khusus image.");
      }
    }
  }

  // modal detail
  $('#modal-detail-beras').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var jumlah = a.data('jumlah')
    var harga = a.data('harga')
    var alamat = a.data('alamat')
    var kecamatan = a.data('kecamatan')
    var kelurahan = a.data('kelurahan')
    var keterangan = a.data('keterangan')
    var jenis_bayar = a.data('jenis_bayar')
    var usersname = a.data('users-name')
    var berasnama = a.data('beras-nama')
    var total = a.data('total')

    var modal = $(this)
    modal.find('.modal-title').text('Detail Transaksi ' + usersname)
    modal.find('.modal-body #usersnames').text('Pembeli : ' + usersname)
    modal.find('.modal-body #jumlahs').text(jumlah + ' Kg')
    modal.find('.modal-body #hargas').text(harga)
    modal.find('.modal-body #alamats').text(alamat)
    modal.find('.modal-body #kecamatans').text(kecamatan)
    modal.find('.modal-body #kelurahans').text(kelurahan)
    modal.find('.modal-body #keterangans').text(keterangan)
    modal.find('.modal-body #jenisbayars').text(jenis_bayar)
    modal.find('.modal-body #berasnamas').text(berasnama)
    modal.find('.modal-body #totals').text(total)

  })
  // modal detail
</script>

@endsection