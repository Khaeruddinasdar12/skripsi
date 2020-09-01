@extends('layouts.galungtemplate')

@section('content')

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

    <div class="col-md-6">

      <!--begin:: Widgets/Revenue Change-->
      <div class="kt-portlet kt-portlet--height-fluid chart-card">
        <div class="kt-widget14">
          <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
              Revenue Change
            </h3>
            <span class="kt-widget14__desc">
              Revenue change breakdown by cities
            </span>
          </div>
          <div class="kt-widget14__content">
            <div class="kt-widget14__chart">
              <div id="penjualan" class="charts" style="height:500px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.714286px; top: -0.5px;">
                  <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0</desc>
                  <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                  <path fill="none" stroke="#593ae1" d="M635,410A160,160,0,0,0,785.752398153737,303.60703732624245" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                  <path fill="#593ae1" stroke="#ffffff" d="M635,413A163,163,0,0,0,788.5790056191196,304.6121692761095L856.4175847883013,328.73533607291864A235,235,0,0,1,635,485Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                  <path fill="none" stroke="#6e4ff5" d="M785.752398153737,303.60703732624245A160,160,0,0,0,491.4374077979751,179.361610152587" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path>
                  <path fill="#6e4ff5" stroke="#ffffff" d="M788.5790056191196,304.6121692761095A163,163,0,0,0,488.7456091941871,178.03714034294802L419.6561116969626,144.0424152288805A240,240,0,0,1,861.1285972306055,330.41055598936373Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                  <path fill="none" stroke="#9077fb" d="M491.4374077979751,179.361610152587A160,160,0,0,0,634.9497345183696,409.99999210431656" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                  <path fill="#9077fb" stroke="#ffffff" d="M488.7456091941871,178.03714034294802A163,163,0,0,0,634.948792040589,412.9999919562725L634.9261725738553,484.99998840321496A235,235,0,0,1,424.14244270327595,146.24986491161218Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="635" y="240" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(2.8266,0,0,2.8266,-1159.5661,-454.0429)" stroke-width="0.3537868923611111">
                    <tspan dy="5.140625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan>
                  </text><text x="635" y="260" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(3.3301,0,0,3.3301,-1479.8565,-587.1441)" stroke-width="0.30029296875">
                    <tspan dy="4.5703125" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan>
                  </text>
                </svg>
              </div>
            </div>
            <div class="kt-widget14__legends">
              <div class="kt-widget14__legend">
                <span class="kt-widget14__bullet kt-bg-success"></span>
                <span class="kt-widget14__stats">+10% New York</span>
              </div>
              <div class="kt-widget14__legend">
                <span class="kt-widget14__bullet kt-bg-warning"></span>
                <span class="kt-widget14__stats">-7% London</span>
              </div>
              <div class="kt-widget14__legend">
                <span class="kt-widget14__bullet kt-bg-brand"></span>
                <span class="kt-widget14__stats">+20% California</span>
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
            label: "Download Sales",
            value: 12
          },
          {
            label: "In-Store Sales",
            value: 30
          },
          {
            label: "Mail-Order Sales",
            value: 20

          }
        ],
        colors: ['#593ae1', '#6e4ff5', '#9077fb']
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