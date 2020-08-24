@extends('layouts.galungtemplate')

@section('content')
<div class="kt-container">
  <div class="row justify-content-center">
<div class="col-md-12">
          <div class="kt-portlet admin-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
	                <span class="kt-portlet__head-icon">
	                  <i class="flaticon-file-1"></i>
	                </span>
	                <h3 class="kt-portlet__head-title">
	                  Laporan Keuangan
	                </h3>&nbsp;
	                <form>		
	                			<select class="form-control-sm">
	                				<option>pilih transaksi</option>
				                	<option>Transaksi Alat</option>
				                	<option>Transaksi Beras</option>
				                	<option>Transaksi Bibit</option>
				                	<option>Transaksi Pupuk</option>
				                	<option>Transaksi Gabah</option>
				                	<option>Transaksi Gadai Sawah</option>

				                </select>
				                <select class="form-control-sm">
				                	<option>pilih tahun</option>
				                	<option>2020</option>
				                </select>
				                <select class="form-control-sm">
				                	<option value="">pilih bulan</option>
				                    <option value="1">Januari</option>
				                    <option value="2">Februari</option>
				                    <option value="3">Maret</option>
				                    <option value="4">April</option>
				                    <option value="5">Mei</option>
				                    <option value="6">Juni</option>
				                    <option value="7">Juli</option>
				                    <option value="8">Agustus</option>
				                    <option value="9">September</option>
				                    <option value="10">Oktober</option>
				                    <option value="11">November</option>
				                    <option value="12">Desember</option>
				                </select>
				                <button class="btn btn-outline-primary btn-sm mr-2"> 
				                	<i class="fas fa-sync-alt"></i>Reload
				                </button>
				    			
				    			<button class="btn btn-outline-danger btn-sm">
				                   <i class="fas fa-file-pdf"></i> PDF
				                </button>
				                
				                <button class="btn btn-outline-success btn-sm">
				                    <i class="fas fa-file-excel"></i> Excel
				                </button>
				    </form>

	              </div>
	              
            	
            </div>
            <div class="kt-portlet__body">
              <div class="kt-section">
                <div class="kt-section__content">
                  <!-- <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">4</th>
                          <td>tesete</td>
                          <td>tes12</td>
                          <td>tes</td>
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
                                    <a href="#" style="display: none !important;" class="kt-nav__link hapus-data}">
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
                  </div> -->
                </div>
              </div>
            </div>

          </div>
        </div>
    </div>
</div>
@endsection