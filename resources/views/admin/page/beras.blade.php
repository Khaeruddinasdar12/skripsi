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
          Data Beras
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
                Jumlah Data Beras Yang Tersedia
              </h5>
              <h4 class="mt-3 kt-font-success" style="font-weight: 800;">
                1 Data
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
                  Data Beras
                </h3>
              </div>
              <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                  <a href="#" class="btn btn-clean btn-icon btn-icon-md btn-tambah-data" data-toggle="modal" data-target="#modal-tambah-beras">
                    <i class="flaticon2-add"></i>
                  </a>
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
                          <th>Nama / jenis Beras</th>
                          <th>Harga</th>
                          <th>Min Beli</th>
                          <th>Stok</th>
                          <th>Gambar</th>
                          <th>Admin Yang Menangani</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach ($data as $beras)
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td>{{$beras -> nama}}</td>
                          <td>{{$beras -> harga}}</td>
                          <td>{{$beras -> min_beli}}</td>
                          <td>{{$beras -> stok}}</td>
                          <td>tes</td>
                          <td>{{$beras -> admins -> name}}</td>
                          <td>
                            <div class="dropdown dropdown-inline">
                              <a href="#" class="btn btn-default btn-icon btn-icon-md btn-sm btn-more-custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-more-1"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-table-custom fade" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 33px, 0px);">
                                <ul class="kt-nav">
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link detail-data" data-toggle="modal" data-target="#modal-detail-user">
                                      <i class="kt-nav__link-icon flaticon2-indent-dots"></i>
                                      <span class="kt-nav__link-text">Detail</span>
                                    </a>
                                  </li>
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link edit-data" data-toggle="modal" data-target="#modal-edit-data">
                                      <i class=" kt-nav__link-icon flaticon2-settings"></i>
                                      <span class="kt-nav__link-text">Edit Data</span>
                                    </a>
                                  </li>
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link hapus-data" data-toggle="modal" data-target="#modal-selesai-gadai">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- modal tambah admin -->
      <div class="modal modal-add fade" id="modal-tambah-beras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <span class="modal-icon">
              <i class="fa fa-user-plus"></i>
            </span>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Beras</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('store.beras') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="POST" name="_method">

                <div class="form-group ">
                  <label>Nama / Jenis Beras</label>
                  <div class="kt-input-icon kt-input-icon--right">
                    <input type="text" class="form-control" placeholder="Masukkan nama / jenis beras" name="nama" id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                      <span><i class="la la-search"></i></span>
                    </span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label>Harga</label>
                      <div class="kt-input-icon kt-input-icon--right">
                        <input type="text" class="form-control" placeholder="Masukkan harga beras" name="harga" id="generalSearch">
                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                          <span><i class="la la-search"></i></span>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group ">
                      <label>Stok</label>
                      <div class="kt-input-icon kt-input-icon--right">
                        <input type="text" class="form-control" placeholder="Masukkan stok beras" name="stok" id="generalSearch">
                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                          <span><i class="la la-search"></i></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label>Minimal Pembelian</label>
                  <div class="kt-input-icon kt-input-icon--right">
                    <input type="text" class="form-control" placeholder="Masukkan minimal pembelian" name="min_beli" id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                      <span><i class="la la-search"></i></span>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleTextarea">Example textarea</label>
                  <textarea class="form-control" id="exampleTextarea" rows="3" style="resize: none;" name="deskripsi"></textarea>
                </div>

                <div class="form-group">
                  <label>Avatar</label>
                  <div class="col-lg-9 col-xl-6">
                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                      <div class="kt-avatar__holder">
                        Max 3MB file size
                      </div>
                      <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                        <i class="fa fa-pen"></i>
                        <input type="file" name="kt_user_add_user_avatar" name="name">
                      </label>
                      <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                        <i class="fa fa-times"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="button-add">
                  <button type="submit" class="btn btn-add">Tambah data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal tambah admin -->

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
                          <span class="kt-widget__label">Jenis Bibit :</span>
                          <span class="kt-widget__data" id="jenis_bibit"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Jenis Pupuk :</span>
                          <span class="kt-widget__data" id="jenis_pupuk"></span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Periode Tanam :</span>
                          <span class="kt-widget__data" id="periode_tanam"></span>
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

      <!-- modal edit admin -->
      <div class="modal modal-edit fade" id="modal-edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <span class="modal-icon">
              <i class="fa fa-user-cog"></i>
            </span>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form id="edit-user-form" action="" method="POST">
                  @csrf
                  <input type="hidden" value="PUT" name="_method">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Lengkap :</label>
                        <div class="kt-input-icon">
                          <input type="text" id="names" class="form-control" aria-describedby="nama" name="name" required>
                          <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-user"></i></span></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email :</label>
                        <div class="kt-input-icon">
                          <input type="email" id="emails" class="form-control" placeholder="Email" aria-describedby="email" disabled="" name="email" required>
                          <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-envelope"></i></span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tempat lahir :</label>
                        <div class="kt-input-icon">
                          <input type="text" id="tempat_lahirs" class="form-control" placeholder="Tempat" aria-describedby="email" name="tempat_lahir" required>
                          <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-map-pin"></i></span></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal lahir :</label>
                        <div class="kt-input-icon">
                          <input class="form-control" type="date" id="tanggal_lahirs" name="tanggal_lahir" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Alamat Lengkap :</label>
                    <div class="kt-input-icon">
                      <input type="text" id="alamats" class="form-control" name="alamat_lengkap" required>
                      <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-map-marked-alt"></i></span></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Provinsi :</label>
                    <div class="kt-input-icon">
                      <input type="text" id="provinsis" class="form-control" value="Sulawesi Selatan" aria-describedby="email" required readonly>
                      <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-map-marked-alt"></i></span></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kota :</label>
                        <select class="form-control" id="kotas" name="kota_id">
                          <option value="">
                            tes
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kecamatan :</label>
                        <div class="kt-input-icon">
                          <input type="text" id="kecamatans" name="kecamatan" class="form-control" placeholder="Kecamatan" aria-describedby="email" required>
                          <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-map"></i></span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kelurahan / Desa :</label>
                        <div class="kt-input-icon">
                          <input type="text" id="kelurahans" class="form-control" placeholder="Kelurahan / Desa" aria-describedby="email" name="kelurahan" required>
                          <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-map-marker-alt "></i></span></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. telephone :</label>
                        <div class="kt-input-icon">
                          <input type="tel" id="nohps" class="form-control" placeholder="No. Telephone" aria-describedby="email" name="nohp" required>
                          <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-phone"></i></span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rukun Tetangga (RT) :</label>
                        <div class="kt-input-icon">
                          <input type="text" id="rts" class="form-control" aria-describedby="email" name="rt" required>
                          <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-map-marker"></i></span></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rukun Warga (RW) :</label>
                        <div class="kt-input-icon">
                          <input type="text" id="rws" class="form-control" aria-describedby="email" name="rw" required>
                          <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-map-marker"></i></span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-gr">
                        <label>Jenis Kelamin :</label>
                        <div class="kt-radio-inline">
                          <label class="kt-radio">
                            <input type="radio" id="L" name="jkel" value="L" required> Laki - laki
                            <span></span>
                          </label>
                          <label class="kt-radio">
                            <input type="radio" id="P" name="jkel" value="P" required> Perempuan
                            <span></span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-gr">
                        <label>Jenis User :</label>
                        <div class="kt-radio-inline">
                          <label class="kt-radio">
                            <input type="radio" id="konsumen" name="role" value="admin" required> Konsumen
                            <span></span>
                          </label>
                          <label class="kt-radio">
                            <input type="radio" id="petani" name="role" value="super admin" required> Petani
                            <span></span>
                          </label>
                        </div>
                      </div>
                    </div>
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
      <!-- end modal edit admin -->

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
  // $('#modal-detail-user').on('show.bs.modal', function(event) {
  //   var a = $(event.relatedTarget)
  //   var email = a.data('email')
  //   var nohp = a.data('nohp')
  //   var periode = a.data('periode')
  //   var harga = a.data('harga')
  //   var keterangan = a.data('keterangan')
  //   var tanggal_lahir = a.data('tanggal_lahir')
  //   var titik_koordinat = a.data('titik_koordinat')
  //   var kecamatan = a.data('kecamatan')
  //   var kelurahan = a.data('kelurahan')
  //   var alamat = a.data('alamat')
  //   var luas_sawah = a.data('luas_sawah')
  //   var jenis_bibit = a.data('jenis_bibit')
  //   var jenis_pupuk = a.data('jenis_pupuk')
  //   var periode_tanam = a.data('periode_tanam')
  //   var kota = a.data('kota')
  //   var name = a.data('name')
  //   var admin = a.data('admin')

  //   var modal = $(this)
  //   modal.find('.modal-title').text('Detail ' + name)
  //   modal.find('.modal-body #email').text(email)
  //   modal.find('.modal-body #nohp').text(nohp)
  //   modal.find('.modal-body #name').text(name)
  //   modal.find('.modal-body #periode').text(periode)
  //   modal.find('.modal-body #harga').text(harga)
  //   modal.find('.modal-body #luas_sawah').text(luas_sawah)
  //   modal.find('.modal-body #jenis_bibit').text(jenis_bibit)
  //   modal.find('.modal-body #jenis_pupuk').text(jenis_pupuk)
  //   modal.find('.modal-body #periode_tanam').text(periode_tanam)
  //   modal.find('.modal-body #titik_koordinat').text(titik_koordinat)
  //   modal.find('.modal-body #kota').text(kota)
  //   modal.find('.modal-body #kecamatan').text(kecamatan)
  //   modal.find('.modal-body #kelurahan').text(kelurahan)
  //   modal.find('.modal-body #alamat').text(alamat)
  //   modal.find('.modal-body #admin').text(admin)
  //   modal.find('.modal-body #keterangan').text(keterangan)
  // })
  // modal detail

  // modal edit
  // $('#modal-edit-ket').on('show.bs.modal', function(event) {
  //   var a = $(event.relatedTarget)
  //   var href = a.data('href')
  //   var name = a.data('name')
  //   var keterangan = a.data('keterangan')

  //   var modal = $(this)
  //   modal.find('.modal-title').text('Edit Keterangan ' + name)
  //   modal.find('.modal-body #keterangans').val(keterangan)
  //   modal.find('.modal-body #edit-ket').attr('action', href)

  // })
  // modal edit

  //Modal Verifikasi gadai
  // $('#modal-selesai-gadai').on('show.bs.modal', function(event) {
  //   var a = $(event.relatedTarget)
  //   var keterangan = a.data('keterangan')
  //   var href = a.data('href')

  //   var modal = $(this)
  //   modal.find('.modal-body #keteranganss').val(keterangan)
  //   modal.find('.modal-body #selesai-gadai').attr('action', href)
  // })
  //End Modal Verifikasi gadai
</script>

@endsection