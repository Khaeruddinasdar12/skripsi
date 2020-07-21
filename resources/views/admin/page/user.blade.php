@extends('layouts.galungtemplate')

@section('content')

<div class="kt-subheader subheader-custom kt-grid__item" id="kt_subheader">
  <div class="kt-container ">
    <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
        Manage User </h3>
      <span class="kt-subheader__separator kt-hidden"></span>
      <div class="kt-subheader__breadcrumbs">
        <a href="" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('index.manage-user') }}" class="kt-subheader__breadcrumbs-link">
          Manage User
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

      <div class="kt-portlet admin-portlet">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
              <i class="flaticon-avatar"></i>
            </span>
            <h3 class="kt-portlet__head-title">
              Data User
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
                      <th>Nama Lengkap</th>
                      <th>Email</th>
                      <th>Kelurahan / Desa</th>
                      <th>Jenis Kelamin</th>
                      <th>Jenis User</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach ($data as $user)
                    <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$user->name}} </td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->kelurahan}}</td>
                      <td>
                        @if($user->jkel == 'P') Perempuan
                        @else Laki-laki @endif
                      </td>
                      <td>{{$user->role}}</td>
                      <td>
                        @if($user->petani_verified == '0')
                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger" style="font-size: 14px;">Belum Terverifikasi</span>
                        @else <span class="btn btn-bold btn-sm btn-font-sm  btn-label-success" style="font-size : 14px;">Terverifikasi</span> @endif
                      </td>
                      <td>
                        <div class="dropdown dropdown-inline">
                          <a href="#" class="btn btn-default btn-icon btn-icon-md btn-sm btn-more-custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-table-custom fade" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 33px, 0px);">
                            <ul class="kt-nav">
                              <li class="kt-nav__item">
                                <button class="btn kt-nav__link detail-data" data-toggle="modal" data-target="#modal-detail-user" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-tempat_lahir="{{$user->tempat_lahir}}" data-tanggal="{{$user->tanggal_lahir}}" data-alamat="{{$user->alamat}}" data-kecamatan="{{$user->kecamatan}}" data-kelurahan="{{$user->kelurahan}}" data-nohp="{{$user->nohp}}" data-petani_verfied="{{$user->petani_verfied}}" data-jkel="{{$user->jkel}}" data-rt="{{$user->rt}}" data-rw="{{$user->rw}}" data-role="{{$user->role}}">
                                  <i class="kt-nav__link-icon flaticon2-indent-dots"></i>
                                  <span class="kt-nav__link-text">Detail</span>
                                </button>
                              </li>
                              <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link edit-data" data-toggle="modal" data-target="#modal-edit-admin">
                                  <i class="kt-nav__link-icon flaticon2-settings"></i>
                                  <span class="kt-nav__link-text">Edit</span>
                                </a>
                              </li>
                              <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link hapus-data">
                                  <i class="kt-nav__link-icon flaticon2-check-mark"></i>
                                  <span class="kt-nav__link-text">Verifikasi</span>
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

      <!-- modal detail user -->
      <div class="modal modal-admin fade" id="modal-detail-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
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
                        </span>
                        <span class="kt-widget__desc">
                          asdar@gmail.com
                        </span>
                      </div>
                    </div>
                    <div class="kt-widget__body widget-detail">
                      <div class="kt-widget__item">
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Tempat lahir :</span>
                          <span class="kt-widget__data">Denmark</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Tanggal lahir :</span>
                          <span class="kt-widget__data">09 - 09 - 1998</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Jenis Kelamin :</span>
                          <span class="kt-widget__data">Laki - laki</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">No. Telephone :</span>
                          <span class="kt-widget__data">085299700715</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Alamat :</span>
                          <span class="kt-widget__data">Palimassang, Desa Padang, Kab. Bulukumba</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Provinsi :</span>
                          <span class="kt-widget__data">Sulawesi Selatan</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Kecamatan :</span>
                          <span class="kt-widget__data">Gantarang</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Kelurahan / Desa :</span>
                          <span class="kt-widget__data">Desa Padang</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Jenis User :</span>
                          <span class="kt-widget__data">Konsumen</span>
                        </div>
                        <div class="kt-widget__contact">
                          <span class="kt-widget__label">Status :</span>
                          <span class="kt-widget__data">Terverifikasi</span>
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
      <div class="modal modal-admin fade" id="modal-edit-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" id="nama">
                        <i class="flaticon2-user-outline-symbol kt-font-brand"></i></span></div>
                    <input type="text" class="form-control" placeholder="Nama User" aria-describedby="nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" id="email"><i class="flaticon2-email kt-font-brand"></i></span></div>
                    <input type="email" class="form-control" placeholder="Email" aria-describedby="email" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-4 col-form-label">Jenis Kelamin :</label>
                  <div class="col-md-6">
                    <div class="kt-checkbox-inline">
                      <label class="kt-radio kt-radio--bold kt-radio--success mr-4">
                        <input type="radio" name="jkel" value="laki-laki" checked required> Laki - laki
                        <span></span>
                      </label>
                      <label class="kt-radio kt-radio--bold kt-radio--success">
                        <input type="radio" name="jkel" value="perempuan" required> Perempuan
                        <span></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tempat lahir :</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="tempat"><i class="flaticon2-architecture-and-city kt-font-brand"></i></span></div>
                        <input type="text" class="form-control" placeholder="Tempat" aria-describedby="email" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal lahir :</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="tempat"><i class="flaticon2-calendar-7 kt-font-brand"></i></span></div>
                        <input class="form-control" type="date" value="1998-09-09" id="example-date-input" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" id="email"><i class="flaticon2-position kt-font-brand"></i></span></div>
                    <input type="text" class="form-control" placeholder="Provinsi" aria-describedby="email" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="email"><i class="flaticon2-position kt-font-brand"></i></span></div>
                        <input type="text" class="form-control" placeholder="Kecamatan" aria-describedby="email" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="email"><i class="flaticon2-position kt-font-brand"></i></span></div>
                        <input type="text" class="form-control" placeholder="Kelurahan / Desa" aria-describedby="email" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" id="email"><i class="flaticon2-telegram-logo kt-font-brand"></i></span></div>
                    <input type="tel" class="form-control" placeholder="No. Telephone" aria-describedby="email" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-4 col-form-label">Jenis user :</label>
                  <div class="col-md-6">
                    <div class="kt-checkbox-inline">
                      <label class="kt-radio kt-radio--bold kt-radio--success mr-4">
                        <input type="radio" name="role" value="admin" checked required> Konsumen
                        <span></span>
                      </label>
                      <label class="kt-radio kt-radio--bold kt-radio--success">
                        <input type="radio" name="role" value="super admin" required> Petani
                        <span></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="button-add">
                  <button type="button" class="btn btn-admin-add">Ubah data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal edit admin -->
    </div>
  </div>
</div>

<script>
  $('#modal-detail-user').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var name = button.data('name')
    var email = button.data('email')
    var tempat_lahir = button.data('tempat_lahir')
    var tanggal_lahir = button.data('tanggal_lahir')
    var alamat = button.data('alamat')
    var kecamatan = button.data('kecamatan')
    var kelurahan = button.data('kelurahan')
    var nohp = button.data('nohp')
    var petani_verified = button.data('petani_verified')
    var jkel = button.data('jkel')
    var rt = button.data('rt')
    var rw = button.data('rw')
    var role = button.data('role')

    var modal = $(this)
    modal.find('.modal-title').text('Detail User ' + name)
    modal.find('.modal-body #name').text(name)
    modal.find('.modal-body #email').text(email)
    modal.find('.modal-body #tempat_lahir').text(tempat_lahir)
    modal.find('.modal-body #tanggal_lahir').text(tanggal_lahir)
    modal.find('.modal-body #alamat').text(alamat)
    modal.find('.modal-body #kecamatan').text(kecamatan)
    modal.find('.modal-body #kelurahan').text(kelurahan)
    modal.find('.modal-body #nohp').text(nohp)
    modal.find('.modal-body #petani_verified').text(petani_verified)
    modal.find('.modal-body #jkel').text(jkel)
    modal.find('.modal-body #rt').text(rt)
    modal.find('.modal-body #rw').text(rw)
    modal.find('.modal-body #role').text(role)
  })
</script>

@endsection