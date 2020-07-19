@extends('layouts.galungtemplate')

@section('content')

<div class="kt-subheader subheader-custom kt-grid__item" id="kt_subheader">
  <div class="kt-container ">
    <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
        Manage User </h3>
      <span class="kt-subheader__separator kt-hidden"></span>
      <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('index.manage-admin') }}" class="kt-subheader__breadcrumbs-link">
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
              Data Admin
            </h3>
          </div>
          <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
              <a href="#" class="btn btn-clean btn-icon btn-icon-md btn-tambah-data" data-toggle="modal" data-target="#modal-tambah-admin">
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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Adhe </td>
                      <td>adhe@gmail.com</td>
                      <td>Deku</td>
                      <td>Super Admin</td>
                      <td>
                        <div class="dropdown dropdown-inline">
                          <a href="#" class="btn btn-default btn-icon btn-icon-md btn-sm btn-more-custom" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-table-custom fade" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 33px, 0px);">
                            <ul class="kt-nav">
                              <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link edit-data" data-toggle="modal" data-target="#modal-edit-admin">
                                  <i class="kt-nav__link-icon flaticon2-settings"></i>
                                  <span class="kt-nav__link-text">Edit</span>
                                </a>
                              </li>
                              <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link hapus-data">
                                  <i class="kt-nav__link-icon flaticon2-rubbish-bin-delete-button"></i>
                                  <span class="kt-nav__link-text">Hapus</span>
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

      <!-- modal tambah admin -->
      <div class="modal modal-admin fade" id="modal-tambah-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="nama">
                            <i class="flaticon-avatar kt-font-brand"></i></span></div>
                        <input type="text" class="form-control" placeholder="Nama Admin" aria-describedby="nama" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="username">
                            <i class="flaticon-avatar kt-font-brand"></i></span></div>
                        <input type="text" class="form-control" placeholder="Username" aria-describedby="username" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" id="email"><i class="flaticon2-email kt-font-brand"></i></span></div>
                    <input type="email" class="form-control" placeholder="Email" aria-describedby="email" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="password1"><i class="flaticon2-lock kt-font-brand"></i></span></div>
                        <input type="password" class="form-control" placeholder="password" aria-describedby="password1" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="password2"><i class="flaticon2-lock kt-font-brand"></i></span></div>
                        <input type="password" class="form-control" placeholder="ulangi password" aria-describedby="password2" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2 col-form-label">Role :</label>
                  <div class="col-md-6">
                    <div class="kt-checkbox-inline">
                      <label class="kt-radio kt-radio--bold kt-radio--success mr-4">
                        <input type="radio" name="role" value="admin" checked required> Admin
                        <span></span>
                      </label>
                      <label class="kt-radio kt-radio--bold kt-radio--success">
                        <input type="radio" name="role" value="super admin" required> Super Admin
                        <span></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="button-add">
                  <button type="button" class="btn btn-admin-add">Tambah data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal tambah admin -->

      <!-- modal edit admin -->
      <div class="modal modal-admin fade" id="modal-edit-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="nama">
                            <i class="flaticon-avatar kt-font-brand"></i></span></div>
                        <input type="text" class="form-control" placeholder="Nama Admin" aria-describedby="nama" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="username">
                            <i class="flaticon-avatar kt-font-brand"></i></span></div>
                        <input type="text" class="form-control" placeholder="Username" aria-describedby="username" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text" id="email"><i class="flaticon2-email kt-font-brand"></i></span></div>
                    <input type="email" class="form-control" placeholder="Email" aria-describedby="email" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="password1"><i class="flaticon2-lock kt-font-brand"></i></span></div>
                        <input type="password" class="form-control" placeholder="password" aria-describedby="password1" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="password2"><i class="flaticon2-lock kt-font-brand"></i></span></div>
                        <input type="password" class="form-control" placeholder="ulangi password" aria-describedby="password2" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2 col-form-label">Role :</label>
                  <div class="col-md-6">
                    <div class="kt-checkbox-inline">
                      <label class="kt-radio kt-radio--bold kt-radio--success mr-4">
                        <input type="radio" name="role" value="admin" checked required> Admin
                        <span></span>
                      </label>
                      <label class="kt-radio kt-radio--bold kt-radio--success">
                        <input type="radio" name="role" value="super admin" required> Super Admin
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