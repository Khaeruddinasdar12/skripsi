@extends('layouts.galungtemplate')

@section('content')

<div class="kt-container">

  <div class="row">
    <div class="col-md-8">
      <div class="owl-carousel loop">

        <!-- gabah -->
        <div class="item">
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  Total Profit
                </h4>
                <span class="kt-widget24__desc">
                  All Customs Value
                </span>
              </div>
              <span class="kt-widget24__stats kt-font-brand">
                $18M
              </span>
            </div>
          </div>
        </div>
        <!-- end gabah -->

        <div class="item">
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  Total Profit
                </h4>
                <span class="kt-widget24__desc">
                  All Customs Value
                </span>
              </div>
              <span class="kt-widget24__stats kt-font-brand">
                $18M
              </span>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  Total Profit
                </h4>
                <span class="kt-widget24__desc">
                  All Customs Value
                </span>
              </div>
              <span class="kt-widget24__stats kt-font-brand">
                $18M
              </span>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  Total Profit
                </h4>
                <span class="kt-widget24__desc">
                  All Customs Value
                </span>
              </div>
              <span class="kt-widget24__stats kt-font-brand">
                $18M
              </span>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  Total Profit
                </h4>
                <span class="kt-widget24__desc">
                  All Customs Value
                </span>
              </div>
              <span class="kt-widget24__stats kt-font-brand">
                $18M
              </span>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="kt-widget24">
            <div class="kt-widget24__details">
              <div class="kt-widget24__info">
                <h4 class="kt-widget24__title">
                  Total Profit
                </h4>
                <span class="kt-widget24__desc">
                  All Customs Value
                </span>
              </div>
              <span class="kt-widget24__stats kt-font-brand">
                $18M
              </span>
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
          items: 1
        },
        600: {
          items: 2
        }
      }
    });
  })
</script>

@endsection