@extends('layouts.galungtemplate')

@section('content')

<div class="kt-container">

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
                      <h2>75</h2>
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
                      <h2>75</h2>
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
                      <h2>75</h2>
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
                      <h2>75</h2>
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
                      <h2>75</h2>
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
  </div>
</div>




<script>
  $(document).ready(function() {
    $('.loop').owlCarousel({
      center: true,
      items: 2,
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
  })
</script>

@endsection