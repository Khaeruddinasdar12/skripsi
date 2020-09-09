@extends('layouts.galungtemplate')

@section('content')

<div class="kt-subheader subheader-custom kt-grid__item" id="kt_subheader">
  <div class="kt-container ">
    <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
        Dashboard </h3>
      <span class="kt-subheader__separator kt-hidden"></span>
      <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{route('admin.home')}}" class="kt-subheader__breadcrumbs-link">
          Dashboard
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

  <!-- card data transaksi & gadai -->
  <div class="row">
    <div class="col-md-7">
      <div class="card card-menu">
        <div class="card-body">

          <h3>Data Transaksi</h3>


          <div class="owl-carousel loop">

            <!-- gabah -->
            <div class="item">
              <a href="{{ route('index.tgabah') }}" class="card card-1">
                <div class="card-body">
                  <div class="title">
                    <div class="card-title">
                      <h2>{{$jmlgabah}} <small>Data</small></h2>
                    </div>
                    <p class="card-text">Transaksi Gabah</p>
                    <p>Lihat <i class="fa fa-arrow-right"></i> </p>
                  </div>
                  <div class="image">
                    <img src="{{ asset('img/card/wheat.png') }}" alt="">
                  </div>
                </div>
              </a>
            </div>
            <!-- end gabah -->

            <div class="item">
              <a href="{{ route('index.talat') }}" class="card card-2">
                <div class="card-body">
                  <div class="title">
                    <div class="card-title">
                      <h2>{{$jmlalat}} <small>Data</small></h2>
                    </div>
                    <p class="card-text">Transaksi Alat</p>
                    <p>Lihat <i class="fa fa-arrow-right"></i> </p>
                  </div>
                  <div class="image">
                    <img src="{{ asset('img/card/tractor.png') }}" alt="">
                  </div>
                </div>
              </a>
            </div>

            <div class="item">
              <a href="{{ route('index.tbibit') }}" class="card card-3">
                <div class="card-body">
                  <div class="title">
                    <div class="card-title">
                      <h2>{{$jmlbibit}} <small>Data</small></h2>
                    </div>
                    <p class="card-text">Transaksi Bibit</p>
                    <p>Lihat <i class="fa fa-arrow-right"></i> </p>
                  </div>
                  <div class="image">
                    <img src="{{ asset('img/card/green.png') }}" alt="">
                  </div>
                </div>
              </a>
            </div>

            <div class="item">
              <a href="{{ route('index.tpupuk') }}" class="card card-4">
                <div class="card-body">
                  <div class="title">
                    <div class="card-title">
                      <h2>{{$jmlpupuk}} <small>Data</small></h2>
                    </div>
                    <p class="card-text">Transaksi Pupuk</p>
                    <p>Lihat <i class="fa fa-arrow-right"></i> </p>
                  </div>
                  <div class="image">
                    <img src="{{ asset('img/card/fertilizer.png') }}" alt="">
                  </div>
                </div>
              </a>
            </div>

            <div class="item">
              <a href="{{ route('index.tberas') }}" class="card card-5">
                <div class="card-body">
                  <div class="title">
                    <div class="card-title">
                      <h2>{{$jmlberas}} <small>Data</small></h2>
                    </div>
                    <p class="card-text">Transaksi Beras</p>
                    <p>Lihat <i class="fa fa-arrow-right"></i> </p>
                  </div>
                  <div class="image">
                    <img src="{{ asset('img/card/rice.png') }}" alt="">
                  </div>
                </div>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="kt-portlet card-gadai">
        <div class="kt-portlet__body">
          <h3>Data Gadai</h3>
          <div class="kt-widget4">
            <a href="{{ route('sedang.gadaisawah') }}" class="kt-widget4__item">
              <div class="kt-widget4__pic kt-widget4__pic--logo">
                <img src="{{ asset('img/card/sawah.jpg') }}" alt="gadai-sawah">
              </div>
              <div class="kt-widget4__info">
                <p class="kt-widget4__title">
                  Sawah Sedang Tergadai
                </p>
                <p class="kt-widget4__text">
                  Lihat Detail
                </p>
              </div>
              <span class="kt-widget4__number kt-font-brand">{{ $jmlgs }} Data</span>
            </a>
            <a href="{{ route('sedang.modaltanam') }}" class="kt-widget4__item">
              <div class="kt-widget4__pic kt-widget4__pic--logo">
                <img src="{{ asset('img/card/tanam.jpg') }}" alt="modal-tanam">
              </div>
              <div class="kt-widget4__info">
                <p class="kt-widget4__title">
                  Modal Tanam Sedang Tergadai
                </p>
                <p class="kt-widget4__text">
                  Lihat Detail
                </p>
              </div>
              <span class="kt-widget4__number kt-font-brand">{{ $jmlmt }} Data</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end card data transaksi & gadai -->

  <!-- chart -->
  <div class="row">

    <div class="col-md-4">

      <!--begin:: Widgets/Revenue Change-->
      <div class="kt-portlet kt-portlet--height-fluid chart-card">
        <div class="kt-widget14">
          <h3>
            Data Penjualan
          </h3>
          <div class="kt-widget14__content">
            <div class="kt-widget14__chart">
              <div id="penjualan" class="charts">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--end:: Widgets/Revenue Change-->
    </div>
  </div>
  <!-- end chart -->
</div>




<script>
  $(document).ready(function() {
    $('.loop').owlCarousel({
      center: true,
      items: 2,
      nav: true,
      loop: true,
      margin: 10,
      responsive: {
        0: {
          items: 2
        },
        600: {
          items: 4
        }
      }
    });
  });

  "use strict";
  // Class definition
  var chart = function() {

    var datapenjualan = function() {
      // PIE CHART
      new Morris.Donut({
        element: 'penjualan',
        data: [{
            label: "Transaksi Pupuk",
            value: '{{$rpupuk}}'
          },
          {
            label: "Transaksi Gabah",
            value: '{{$rgabah}}'
          },
          {
            label: "Transaksi Beras",
            value: '{{$rberas}}'
          },
          {
            label: "Transaksi Alat",
            value: '{{$ralat}}'
          },
          {
            label: "Transaksi Bibit",
            value: '{{$rbibit}}'
          }
        ],
        colors: ['#5a9ec0', '#00a5cf', '#5cc28a', '#6bca71', '#25a18e']
      });
    }

    return {
      // public functions
      init: function() {
        datapenjualan();
      }
    };
  }();

  jQuery(document).ready(function() {
    chart.init();
  });
</script>

@endsection