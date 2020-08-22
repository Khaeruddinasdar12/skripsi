@extends('layouts.galungtemplate')

@section('content')

<div class="kt-subheader subheader-custom kt-grid__item" id="kt_subheader">
  <div class="kt-container ">
    <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
        Gadai Sawah </h3>
      <span class="kt-subheader__separator kt-hidden"></span>
      <div class="kt-subheader__breadcrumbs">
        <a href="" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
          Sedang Tergadai
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
      <!-- alert section -->
      @include('admin.page.alert')
      <!-- end alert section -->
      <div class="row">
        <div class="col-md-2">
          <div class="kt-portlet sticky kt-iconbox--animate-faster" data-sticky="true" data-margin-top="100px" data-sticky-for="1023" data-sticky-class="kt-sticky">
            <div class="kt-portlet__body">
              <h5 style="color: #222;">
                Jumlah Data Sawah Yang Sedang Tergadai
              </h5>
              <h4 class="mt-3" style="font-weight: 800;">
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
                  Data Sawah Yang Sedang Tergadai
                </h3>
              </div>
              <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions kt-search-form">
                  <div class="dropdown show" id="kt_quick_search_toggle">
                    <div class="search-form" data-toggle="dropdown" data-offset="-20px,0px" aria-expanded="true">
                      <i class="fa fa-search"></i>
                      <span class="border-right"></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg show search-form-dropdown" x-placement="bottom-end" style="position: absolute; will-change: transform; top: -10000px; left: -200px;">
                      <div class="kt-input-icon kt-input-icon--right">
                        <form action="{{route('sedang.gadaisawah')}}" method="get">
                          <input type="text" class="form-control" placeholder="Cari" id="generalSearch" name="search">
                          <span class="kt-input-icon__icon kt-input-icon__icon--right">
                            <button type="button">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <rect x="0" y="0" width="24" height="24"></rect>
                                  <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                  <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                              </svg>
                            </button>
                          </span>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
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
                          <th>Nama Penggadai</th>
                          <th>Nama Sawah</th>
                          <th>Periode Gadai</th>
                          <th>Harga Gadai</th>
                          <th>Status</th>
                          <th>Admin Yang Menangani</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      @if ($jml == 0)
                      <tbody style="text-align: center;">
                        <td colspan="8">Belum ada data</td>
                      </tbody>
                      @endif
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach ($data as $gadais)
                        <!-- jika admin tersedia atau tidak -->
                        @if($gadais->admins == null)
                        @php $admin = 'Admin Telah di hapus'; @endphp
                        @else
                        @php $admin = $gadais->sawahs->users->name; @endphp
                        @endif
                        <!-- End jika admin tersedia atau tidak -->
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td>{{$gadais -> sawahs -> users -> name}}</td>
                          <td>{{$gadais -> sawahs -> nama}}</td>
                          <td>{{$gadais -> periode}}</td>
                          <td>Rp.{{format_uang($gadais -> harga)}}</td>
                          <td>
                            <div class="btn btn-bold btn-sm btn-font-sm  btn-label-warning" style="font-size: 14px;">
                              Sedang Tergadai
                            </div>
                          </td>
                          <td>{{$admin}}</td>
                          <td>
                            <div class="dropdown dropdown-inline">
                              <a href="#" class="btn btn-default btn-icon btn-icon-md btn-sm btn-more-custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-more-1"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-table-custom fade" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 33px, 0px);">
                                <ul class="kt-nav">
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link detail-data" data-toggle="modal" data-target="#modal-detail-user" data-id="{{$gadais->id}}" data-nama-sawah="{{$gadais -> sawahs -> nama}}" data-email="{{$gadais->sawahs->users->email}}" data-nohp="{{$gadais->sawahs->users->nohp}}" data-periode="{{$gadais->periode}}" data-harga="Rp.{{format_uang($gadais->harga)}}" data-keterangan="{{$gadais->keterangan}}" data-titik_koordinat="{{$gadais->sawahs->titik_koordinat}}" data-kecamatan="{{$gadais->sawahs->kecamatan}}" data-kelurahan="{{$gadais->sawahs->kelurahan}}" data-alamat="{{$gadais->sawahs->alamat}}" data-luas_sawah="{{$gadais->sawahs->luas_sawah}}" data-kota="{{$gadais->sawahs->alamats->tipe}} {{$gadais->sawahs->alamats->nama_kota}}" data-name="{{$gadais->sawahs->users->name}}" data-admin="{{$admin}}">
                                      <i class="kt-nav__link-icon flaticon2-indent-dots"></i>
                                      <span class="kt-nav__link-text">Detail</span>
                                    </a>
                                  </li>
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link edit-data" data-toggle="modal" data-target="#modal-edit-ket" data-id="{{$gadais->id}}" data-name="{{$gadais->sawahs->users->name}}" data-keterangan="{{$gadais->keterangan}}" data-href="{{ route('editketerangan.gadaisawah', ['id' => $gadais->id]) }}">
                                      <i class=" kt-nav__link-icon flaticon2-settings"></i>
                                      <span class="kt-nav__link-text">Edit Keterangan</span>
                                    </a>
                                  </li>
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link hapus-data" data-toggle="modal" data-target="#modal-selesai-gadai" data-id="{{$gadais->id}}" data-keterangan="{{$gadais->keterangan}}" data-href="{{ route('selesaistatus.gadaisawah', ['id' => $gadais->id]) }}">
                                      <i class="kt-nav__link-icon flaticon2-check-mark"></i>
                                      <span class="kt-nav__link-text">Selesaikan Gadai</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
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

      <!-- modal detail user -->
      <div class="modal fade" id="modal-detail-user" tabindex="-1" role="dialog" aria-labelledby="modal-detail-user">
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
                        <span class="kt-widget__username" id="name">
                        </span><br>
                        <span class="kt-widget__label" id="email"></span><br>
                        <span class="kt-widget__label" id="nohp"></span>
                      </div>
                    </div>
                    <div class="kt-widget__body widget-detail">
                      <div class="kt-widget__item">
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Nama Sawah:</span>
                          <span class="kt-widget__data" id="nama-sawah"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Periode Gadai:</span>
                          <span class="kt-widget__data" id="periode"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Harga Gadai :</span>
                          <span class="kt-widget__data" id="harga"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Luas Sawah :</span>
                          <span class="kt-widget__data" id="luas_sawah"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Titik Koordinat Sawah :</span>
                          <span class="kt-widget__data" id="titik_koordinat"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Provinsi :</span>
                          <span class="kt-widget__data">Sulawesi Selatan</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Kota :</span>
                          <span class="kt-widget__data" id="kota"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Kecamatan :</span>
                          <span class="kt-widget__data" id="kecamatan"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Kelurahan / Desa :</span>
                          <span class="kt-widget__data" id="kelurahan"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Alamat :</span>
                          <span class="kt-widget__data" id="alamat"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Status :</span>
                          <span class="kt-widget__data">Sedang Tergadai</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Admin Yang Menangani :</span>
                          <span class="kt-widget__data" id="admin"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Keterangan :</span>
                          <span class="kt-widget__data" id="keterangan"></span>
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

      <!-- ,odal edit keterangan -->
      <div class="modal modal-edit fade" id="modal-edit-ket" tabindex="-1" role="dialog" aria-labelledby="modal-edit-ket" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <span class="modal-icon">
              <i class="fa fa-user-cog"></i>
            </span>
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form id="edit-ket" action="" method="POST">
                  @csrf
                  <input type="hidden" value="PUT" name="_method">

                  <div class="form-group">
                    <label for="exampleTextarea">Ubah keterangan :</label>
                    <textarea class="form-control" id="keterangans" name="keterangan" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 97px; resize: none" required></textarea>
                  </div>

                  <div class="button-edit">
                    <button type="submit" class="btn btn-edit">Simpan perubahan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal edit keterangan -->

      <!-- modal verifikasi -->
      <div class="modal modal-verif fade" id="modal-selesai-gadai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <span class="modal-icon">
              <i class="fa fa-info"></i>
            </span>

            <div class="modal-body">
              <form action="" method="POST" id="selesai-gadai">
                @csrf
                <input type="hidden" value="PUT" name="_method">
                <h3>Periode Gadai Sawah Telah Selesai?</h3>
                <p>Data sawah yang telah berakhir periode gadainya</p>
                <p>akan di pindahkan ke tab Riwayat Gadai</p>

                <div class="form-group">
                  <label for="exampleTextarea">Tambahkan keterangan :</label>
                  <textarea class="form-control" id="keteranganss" name="keterangan" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 97px; resize: none" required></textarea>
                </div>

                <div class="row verif-form">
                  <div class="col-md-6">
                    <button type="button" class="btn close-modal" data-dismiss="modal" aria-label="Close">Cancel</button>
                  </div>

                  <div class="col-md-6">

                    <input type="submit" value="Verifikasi" class="btn btn-verif btn-flat">
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end modal verifikasi -->

    </div>
  </div>
</div>

<script>
  // modal detail
  $('#modal-detail-user').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var email = a.data('email')
    var namasawah = a.data('nama-sawah')
    var nohp = a.data('nohp')
    var periode = a.data('periode')
    var harga = a.data('harga')
    var keterangan = a.data('keterangan')
    var tanggal_lahir = a.data('tanggal_lahir')
    var titik_koordinat = a.data('titik_koordinat')
    var kecamatan = a.data('kecamatan')
    var kelurahan = a.data('kelurahan')
    var alamat = a.data('alamat')
    var luas_sawah = a.data('luas_sawah')
    var kota = a.data('kota')
    var name = a.data('name')
    var admin = a.data('admin')

    var modal = $(this)
    modal.find('.modal-title').text('Detail ' + name)
    modal.find('.modal-body #email').text(email)
    modal.find('.modal-body #nama-sawah').text(namasawah)
    modal.find('.modal-body #nohp').text(nohp)
    modal.find('.modal-body #name').text(name)
    modal.find('.modal-body #periode').text(periode)
    modal.find('.modal-body #harga').text(harga)
    modal.find('.modal-body #luas_sawah').text(luas_sawah)
    modal.find('.modal-body #titik_koordinat').text(titik_koordinat)
    modal.find('.modal-body #kota').text(kota)
    modal.find('.modal-body #kecamatan').text(kecamatan)
    modal.find('.modal-body #kelurahan').text(kelurahan)
    modal.find('.modal-body #alamat').text(alamat)
    modal.find('.modal-body #admin').text(admin)
    modal.find('.modal-body #keterangan').text(keterangan)
  })
  // modal detail

  // modal edit
  $('#modal-edit-ket').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var href = a.data('href')
    var name = a.data('name')
    var keterangan = a.data('keterangan')

    var modal = $(this)
    modal.find('.modal-title').text('Edit Keterangan ' + name)
    modal.find('.modal-body #keterangans').val(keterangan)
    modal.find('.modal-body #edit-ket').attr('action', href)

  })
  // modal edit

  //Modal Verifikasi gadai
  $('#modal-selesai-gadai').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var keterangan = a.data('keterangan')
    var href = a.data('href')

    var modal = $(this)
    modal.find('.modal-body #keteranganss').val(keterangan)
    modal.find('.modal-body #selesai-gadai').attr('action', href)
  })
  //End Modal Verifikasi gadai
</script>

@endsection