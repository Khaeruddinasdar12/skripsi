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
          Alat
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
          Data Alat
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
                Jumlah Data Alat Tani Yang Tersedia
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
                  Data Alat Tani
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
                        <form action="" method="get">
                          <input type="text" class="form-control" placeholder="Cari" id="generalSearch">
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
                <div class="kt-portlet__head-actions">
                  <a href="#" class="btn btn-clean btn-icon btn-icon-md btn-tambah-data" data-toggle="modal" data-target="#modal-tambah-alat">
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
                          <th>Nama Alat</th>
                          <th>Harga</th>
                          <th>Stok</th>
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
                        @foreach ($data as $alat)
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td>{{$alat -> nama}}</td>
                          <td>Rp. {{format_uang($alat -> harga)}}</td>
                          <td>{{$alat -> stok}}</td>
                          <td>
                            <div class="dropdown dropdown-inline">
                              <a href="#" class="btn btn-default btn-icon btn-icon-md btn-sm btn-more-custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-more-1"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-table-custom fade" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 33px, 0px);">
                                <ul class="kt-nav">
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link detail-data" data-toggle="modal" data-target="#modal-detail-alat" data-id="{{$alat->id}}" data-nama="{{$alat->nama}}" data-harga="{{format_uang($alat -> harga)}}" data-stok="{{$alat->stok}}" data-keterangan="{{$alat->keterangan}}" data-image="{{asset('storage/'.$alat->gambar)}}" data-admin_name="{{$alat->admins->name}}" data-min_beli="{{$alat->min_beli}}">
                                      <i class="kt-nav__link-icon flaticon2-indent-dots"></i>
                                      <span class="kt-nav__link-text">Detail</span>
                                    </a>
                                  </li>
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link edit-data" data-toggle="modal" data-target="#modal-edit-data" data-id="{{$alat->id}}" data-nama="{{$alat->nama}}" data-harga="{{$alat->harga}}" data-stok="{{$alat->stok}}" data-keterangan="{{$alat->keterangan}}" data-image="{{asset('storage/'.$alat->gambar)}}" data-admin_name="{{$alat->admins->name}}" data-href="{{ route('update.alat', ['id' => $alat->id]) }}" data-min_beli="{{$alat->min_beli}}">
                                      <i class=" kt-nav__link-icon flaticon2-settings"></i>
                                      <span class="kt-nav__link-text">Edit Data</span>
                                    </a>
                                  </li>
                                  <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link hapus-data" data-toggle="modal" data-target="#modal-hapus" data-id="{{$alat->id}}" data-href="{{ route('delete.alat', ['id' => $alat->id]) }}">
                                      <i class="kt-nav__link-icon fa fa-trash-alt"></i>
                                      <span class="kt-nav__link-text">Hapus data</span>
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

      <!-- modal tambah alat -->
      <div class="modal modal-add fade" id="modal-tambah-alat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <span class="modal-icon">
              <i class="fa fa-user-plus"></i>
            </span>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alat Tani</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('store.alat') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="POST" name="_method">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label>Nama Alat Tani</label>
                      <input type="text" class="form-control" placeholder="Masukkan nama alat" name="nama" required>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Harga (per Kg)</label>
                          <input type="text" class="form-control" placeholder="Masukkan harga" name="harga" id="rupiah" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Stok (per Kg)</label>
                          <input type="text" class="form-control" placeholder="Masukkan stok" name="stok" id="generalSearch" required>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label>Minimal Pembelian</label>
                      <input type="text" class="form-control" placeholder="Masukkan Minimal Pembelian" name="min_beli" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea">Keterangan</label>
                      <textarea class="form-control" id="exampleTextarea" rows="6" style="resize: none;" name="keterangan" required></textarea>
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
      <!-- end modal tambah alat -->

      <!-- modal detail alat -->
      <div class="modal fade" id="modal-detail-alat" tabindex="-1" role="dialog">
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
                  </div>
                </div>
                <div class="kt-portlet__body">
                  <div class="kt-widget19__wrapper">
                    <div class="kt-widget19__content">
                      <div class="kt-widget19__info" style="padding-left: 0;">
                        <span class="kt-widget19__username" id="harga"></span>
                        <span class="kt-widget19__comment" id="min_beli">
                        </span>
                      </div>
                      <div class="kt-widget19__stats">
                        <span class="kt-widget19__number kt-font-brand" id="stok"></span>
                        <a href="#" class="kt-widget19__comment">
                          Stok Tersedia
                        </a>
                      </div>
                    </div>
                    <div class="kt-widget19__text" id="keterangan"></div>
                  </div>
                  <div class="kt-widget19__action" id="admin_name"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- modal detail alat -->

      <!-- modal edit data -->
      <div class="modal modal-edit fade" id="modal-edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <span class="modal-icon">
              <i class="fa fa-user-plus"></i>
            </span>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Beras</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" id="edit-alat" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="PUT" name="_method">

                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Nama Alat Tani</label>
                          <input type="text" class="form-control" name="nama" id="namas" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Minimal Pembelian</label>
                          <input type="text" class="form-control" name="min_beli" id="min_belis" placeholder="Masukkan Minimal Pembelian" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Harga (per Kg)</label>
                          <input type="text" class="form-control" name="harga" id="hargas" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label>Stok (per Kg)</label>
                          <input type="text" class="form-control" name="stok" id="stoks" required>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea">Keterangan</label>
                      <textarea class="form-control" id="keterangans" rows="6" style="resize: none;" name="keterangan" required></textarea>
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
                            <input type="file" name="gambar" onchange="tampilkanPreview(this,'edit-preview')" accept="image/*">
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

      <!-- modal hapus -->
      <div class="modal modal-hapus fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <span class="modal-icon">
              <i class="fa fa-trash-alt"></i>
            </span>
            <div class="modal-body">
              <h3>Hapus Data?</h3>
              <p>Data yang telah di hapus tidak dapat</p>
              <p>dikembalikan lagi</p>

              <div class="row verif-form">
                <div class="col-md-6">
                  <button type="button" class="btn close-modal" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>

                <div class="col-md-6">
                  <form action="" method="POST" id="hapus-data">
                    @csrf
                    <input type="hidden" value="delete" name="_method">

                    <input type="submit" value="Hapus data" class="btn btn-verif btn-flat">

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal hapus -->

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
  $('#modal-detail-alat').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var nama = a.data('nama')
    var harga = a.data('harga')
    var stok = a.data('stok')
    var min_beli = a.data('min_beli')
    var keterangan = a.data('keterangan')
    var image = a.data('image')
    var admin_name = a.data('admin_name')

    var modal = $(this)
    modal.find('.modal-title').text('Detail Alat ' + nama)
    modal.find('.modal-body #nama').text('Alat ' + nama)
    modal.find('.modal-body #harga').text('Harga Rp. ' + harga)
    modal.find('.modal-body #stok').text(stok)
    modal.find('.modal-body #min_beli').text('Minimal Pembelian : ' + min_beli)
    modal.find('.modal-body #keterangan').text('Keterangan : ' + keterangan)
    modal.find('.modal-body #admin_name').text('Admin yang menangani : ' + admin_name)
    modal.find('.modal-body #image').attr('src', image)

  })
  // modal detail

  // modal edit
  $('#modal-edit-data').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var nama = a.data('nama')
    var harga = a.data('harga')
    var stok = a.data('stok')
    var min_beli = a.data('min_beli')
    var keterangan = a.data('keterangan')
    var image = a.data('image')
    var admin_name = a.data('admin_name')
    var href = a.data('href')

    var modal = $(this)
    modal.find('.modal-title').text('Edit Alat ' + nama)
    modal.find('.modal-body #namas').val(nama)
    modal.find('.modal-body #hargas').val(harga)
    modal.find('.modal-body #stoks').val(stok)
    modal.find('.modal-body #min_belis').val(min_beli)
    modal.find('.modal-body #keterangans').val(keterangan)
    modal.find('.modal-body #admin_names').val(admin_name)
    modal.find('.modal-body #edit-preview').attr('src', image)
    modal.find('.modal-body #edit-alat').attr('action', href)
  })
  // modal edit

  //Modal hapus
  $('#modal-hapus').on('show.bs.modal', function(event) {
    var a = $(event.relatedTarget)
    var href = a.data('href')

    var modal = $(this)
    modal.find('.modal-body #hapus-data').attr('action', href)
  })
  //End Modal hapus
</script>

@endsection