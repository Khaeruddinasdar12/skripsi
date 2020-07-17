@extends('layouts.galungtemplate')

@section('content')
<div class="container">
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
              <a href="#" class="btn btn-clean btn-icon btn-icon-md btn-tambah-data" title="Tambah data admin">
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
                          <a href="#" class="btn btn-default btn-icon btn-icon-md btn-sm btn-more-admin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-table-admin" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-149px, 33px, 0px);">
                            <ul class="kt-nav">
                              <li class="kt-nav__item edit-admin">
                                <a href="#" class="kt-nav__link">
                                  <i class="kt-nav__link-icon flaticon2-settings"></i>
                                  <span class="kt-nav__link-text">Edit</span>
                                </a>
                              </li>
                              <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link hapus-admin">
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

    </div>
  </div>
</div>
@endsection