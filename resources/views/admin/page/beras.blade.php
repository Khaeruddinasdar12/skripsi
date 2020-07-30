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
                          <td>Rp.{{format_uang($beras -> harga)}}</td>
                          <td>{{$beras -> min_beli}}</td>
                          <td>{{$beras -> stok}}</td>
                          <td>{{$beras -> admins -> name}}</td>
                          <td>
                            <div class="dropdown dropdown-inline">
                              <a href="#" class="btn btn-default btn-icon btn-icon-md btn-sm btn-more-custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-more-1"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-table-custom fade" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 33px, 0px);">
                                <ul class="kt-nav">
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link detail-data" data-toggle="modal" data-target="#modal-detail-user" data-id="{{$beras->id}}" data-nama="{{$beras->nama}}" data-harga="{{format_uang($beras -> harga)}}" data-min_beli="{{$beras->min_beli}}" data-stok="{{$beras->stok}}" data-deskripsi="{{$beras->deskripsi}}" data-image="{{asset('storage/'.$beras->gambar)}}" data-admin_name="{{$beras->admins->name}}">
                                      <i class="kt-nav__link-icon flaticon2-indent-dots"></i>
                                      <span class="kt-nav__link-text">Detail</span>
                                    </a>
                                  </li>
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link edit-data" data-toggle="modal" data-target="#modal-edit-data" data-id="{{$beras->id}}" data-nama="{{$beras->nama}}" data-harga="{{format_uang($beras -> harga)}}" data-min_beli="{{$beras->min_beli}}" data-stok="{{$beras->stok}}" data-deskripsi="{{$beras->deskripsi}}" data-image="{{asset('storage/'.$beras->gambar)}}" data-admin_name="{{$beras->admins->name}}" data-href="{{ route('update.beras', ['id' => $beras->id]) }}">
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label>Nama / Jenis Beras</label>
                      <input type="text" class="form-control" placeholder="Masukkan nama / jenis beras" name="nama" id="generalSearch" required>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Harga</label>
                          <input type="text" class="form-control" placeholder="Masukkan harga beras" name="harga" id="generalSearch" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Stok</label>
                          <input type="text" class="form-control" placeholder="Masukkan stok beras" name="stok" id="generalSearch" required>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label>Minimal Pembelian</label>
                      <input type="text" class="form-control" placeholder="Masukkan minimal pembelian" name="min_beli" id="generalSearch" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea">Deskripsi</label>
                      <textarea class="form-control" id="exampleTextarea" rows="6" style="resize: none;" name="deskripsi" required></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Upload Gambar</label>
                      <div class="col-lg-9 col-xl-6">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                          <div class="kt-avatar__holder">
                            <span class="message-image"> Max ukuran gambar 3MB </span>
                            <img id="preview" src="" alt="" width="400px">
                          </div>
                          <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Masukkan gambar">
                            <i class="fa fa-plus"></i>
                            <input type="file" name="gambar" onchange="tampilkanPreview(this,'preview')" accept="image/*" required>
                          </label>
                          <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                            <i class="fa fa-times"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row verif-form">
                  <div class="col-md-6">
                    <button type="button" class="btn close-modal" data-dismiss="modal" aria-label="Close">Cancel</button>
                  </div>

                  <div class="col-md-6">

                    <input type="submit" value="Tambah Data" class="btn btn-verif btn-flat">
                  </div>
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
            <div class="modal-body detail-modal" style="padding-top: 10px;">
              <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                  <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides">
                    <img src="" alt="" id="image">
                    <h3 class="kt-widget19__title kt-font-light" id="nama"></h3>
                    <div class="kt-widget19__shadow"></div>
                    <div class="kt-widget19__labels">
                      <a href="#" class="btn btn-label-light-o2 btn-bold ">Recent</a>
                    </div>
                  </div>
                </div>
                <div class="kt-portlet__body">
                  <div class="kt-widget19__wrapper">
                    <div class="kt-widget19__content">
                      <div class="kt-widget19__info" style="padding-left: 0;">
                        <span class="kt-widget19__username" id="harga"></span>
                        <span class="kt-widget19__time" id="min_beli"></span>
                      </div>
                      <div class="kt-widget19__stats">
                        <span class="kt-widget19__number kt-font-brand" id="stok"></span>
                        <a href="#" class="kt-widget19__comment">
                          Stok Tersedia
                        </a>
                      </div>
                    </div>
                    <div class="kt-widget19__text" id="deskripsi"></div>
                  </div>
                  <div class="kt-widget19__action" id="admin_name"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- modal detail user -->

      <!-- modal edit data -->
      <div class="modal modal-add fade" id="modal-edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
              <form action="" method="POST" id="edit-beras" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="PUT" name="_method">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label>Nama / Jenis Beras</label>
                      <input type="text" class="form-control" placeholder="Masukkan nama / jenis beras" name="nama" id="namas" required>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Harga</label>
                          <input type="text" class="form-control" placeholder="Masukkan harga beras" name="harga" id="hargas" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Stok</label>
                          <input type="text" class="form-control" placeholder="Masukkan stok beras" name="stok" id="stoks" required>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label>Minimal Pembelian</label>
                      <input type="text" class="form-control" placeholder="Masukkan minimal pembelian" name="min_beli" id="min_belis" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea">Deskripsi</label>
                      <textarea class="form-control" id="deskripsis" rows="6" style="resize: none;" name="deskripsi" required></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Upload Gambar</label>
                      <div class="col-lg-9 col-xl-6">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                          <div class="kt-avatar__holder">
                            <span class="message-image"> Max ukuran gambar 3MB </span>
                            <img id="edit-preview" src="" alt="" width="400px">
                          </div>
                          <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Masukkan gambar">
                            <i class="fa fa-plus"></i>
                            <input type="file" name="gambar" onchange="tampilkanPreview(this,'edit-preview')" accept="image/*" required>
                          </label>
                          <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                            <i class="fa fa-times"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row verif-form">
                  <div class="col-md-6">
                    <button type="button" class="btn close-modal" data-dismiss="modal" aria-label="Close">Cancel</button>
                  </div>

                  <div class="col-md-6">

                    <input type="submit" value="Simpan perubahan" class="btn btn-verif btn-flat">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal edit data -->

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
  $('#modal-detail-user').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var nama = a.data('nama')
    var harga = a.data('harga')
    var min_beli = a.data('min_beli')
    var stok = a.data('stok')
    var deskripsi = a.data('deskripsi')
    var image = a.data('image')
    var admin_name = a.data('admin_name')

    var modal = $(this)
    modal.find('.modal-title').text('Detail Beras ' + nama)
    modal.find('.modal-body #nama').text('Beras ' + nama)
    modal.find('.modal-body #harga').text('Harga Rp. ' + harga)
    modal.find('.modal-body #min_beli').text('Minimal Pembelian ' + min_beli)
    modal.find('.modal-body #stok').text(stok)
    modal.find('.modal-body #deskripsi').text(deskripsi)
    modal.find('.modal-body #admin_name').text('Admin yang menangani : ' + admin_name)
    modal.find('.modal-body #image').attr('src', image)

  })
  // modal detail

  // modal edit
  $('#modal-edit-data').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var nama = a.data('nama')
    var harga = a.data('harga')
    var min_beli = a.data('min_beli')
    var stok = a.data('stok')
    var deskripsi = a.data('deskripsi')
    var image = a.data('image')
    var admin_name = a.data('admin_name')
    var href = a.data('href')

    var modal = $(this)
    modal.find('.modal-title').text('Detail Beras ' + nama)
    modal.find('.modal-body #namas').val(nama)
    modal.find('.modal-body #hargas').val(harga)
    modal.find('.modal-body #min_belis').val(min_beli)
    modal.find('.modal-body #stoks').val(stok)
    modal.find('.modal-body #deskripsis').val(deskripsi)
    modal.find('.modal-body #admin_names').val(admin_name)
    modal.find('.modal-body #edit-preview').attr('src', image)
    modal.find('.modal-body #edit-beras').attr('action', href)
  })
  // modal edit
</script>

@endsection