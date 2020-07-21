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
				<a href="{{ route('index.gadaisawah') }}" class="kt-subheader__breadcrumbs-link">
					Gadai Sawah
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
							<i class="flaticon2-tag"></i>
						</span>
						<h3 class="kt-portlet__head-title">
							Gadai Sawah
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
											<th>Periode Gadai</th>
											<th>Nilai Gadai</th>
											<th>No. Telephone</th>
											<th>Verifikasi</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">tes</th>
											<td>tes </td>
											<td>tes</td>
											<td>tes</td>
											<td>tes</td>
											<td>
												<span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger" style="font-size: 14px;">Belum Terverifikasi</span>
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