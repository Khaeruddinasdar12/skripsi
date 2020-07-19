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
        <a href="#" class="btn kt-subheader__btn-daterange">
          <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today:</span>&nbsp;
          <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Jul 19</span>
          <span class="flaticon2-calendar-5"></span>
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
                    <tr>
                      <th scope="row">1</th>
                      <td>Adhe </td>
                      <td>adhe@gmail.com</td>
                      <td>Desa Padang</td>
                      <td>Laki - Laki</td>
                      <td>konsumen</td>
                      <td>
                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-success" style="font-size : 14px;">Terverifikasi</span>
                      </td>
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
                    <tr>
                      <th scope="row">2</th>
                      <td>Asdar </td>
                      <td>asdar@gmail.com</td>
                      <td>Desa Padang</td>
                      <td>Laki - laki</td>
                      <td>konsumen</td>
                      <td>
                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger" style="font-size: 14px;">Belum Terverifikasi</span>
                      </td>
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
              <h5 class="modal-title" id="exampleModalLabel">Detail user</h5>
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
                        <a href="#" class="kt-widget__username">
                          Asdar
                        </a>
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
                        <i class="flaticon-avatar kt-font-brand"></i></span></div>
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
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" id="password1"><i class="flaticon2-hospital kt-font-brand"></i></span></div>
                    <input type="text" class="form-control" placeholder="Tempat dan tanggal lahir" aria-describedby="tempat" required>
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
                    <div class="input-group-prepend"><span class="input-group-text" id="email"><i class="flaticon-support kt-font-brand"></i></span></div>
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

@endsection