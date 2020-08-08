<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile galung-header-mobile  kt-header-mobile--fixed ">
  <div class="kt-header-mobile__logo">
    <a href="#">
      <img alt="Logo" src=" {{ asset('img/logocrop.png') }} " class="img-fluid logo-mobile" />
    </a>
  </div>
  <div class="kt-header-mobile__toolbar">
    <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
    <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
  </div>
</div>
<!-- end:: Header Mobile -->

<div id="kt_header" class="kt-header  kt-header--fixed galung-header" data-ktheader-minimize="on">
  <div class="kt-container  kt-container--fluid ">

    <!-- begin: Header Menu -->
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn">
      <i class="la la-close"></i>
    </button>

    <!-- begin:: Brand -->
    <div class="kt-header__brand" id="kt_header_brand">
      <a class="kt-header__brand-logo" href="?page=index">
        <img alt="Logo" src=" {{ asset('img/logocrop.png') }} " class="logogalung">
      </a>
      <span class="border-right"></span>
    </div>
    <!-- end:: Brand -->

    <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
      <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
        <ul class="kt-menu__nav ">

          <li class="kt-menu__item kt-menu__item--rel {{ request()->is('admin') ? 'kt-menu__item--open kt-menu__item--here' : '' }}">
            <a href="{{ route('admin.home') }}" class="kt-menu__link">
              <span class="kt-menu__link-text {{ request()->is('admin') ? '' : 'top-text-nav' }}">Dashboard</span>
            </a>
          </li>

          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text top-text-nav">Gabah</span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
              <ul class="kt-menu__subnav">
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('admin.home') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Data Gabah</span>
                  </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('admin.home') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Transaksi Gabah</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="kt-menu__item kt-menu__item--rel">
            <a href="{{ route('admin.home') }}" class="kt-menu__link" id="modaltanam">
              <span class="kt-menu__link-text top-text-nav">Modal Tanam</span>
            </a>
          </li>

          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ request()->is('admin/gadai-sawah-daftar-gadai') || request()->is('admin/gadai-sawah-sedang-gadai') || request()->is('admin/gadai-sawah-riwayat-gadai') ? 'kt-menu__item--open kt-menu__item--here' : '' }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle" id="gadaisawah">
              <span class="kt-menu__link-text {{ request()->is('admin/gadai-sawah-daftar-gadai') || request()->is('admin/gadai-sawah-sedang-gadai') || request()->is('admin/gadai-sawah-riwayat-gadai') ? '' : 'top-text-nav' }}">Gadai Sawah</span>
              <i class="fa fa-angle-down {{ request()->is('admin/gadai-sawah-daftar-gadai') || request()->is('admin/gadai-sawah-sedang-gadai') || request()->is('admin/gadai-sawah-riwayat-gadai') ? 'icon-here' : '' }} "></i>
            </a>
            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
              <ul class="kt-menu__subnav">
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('daftar.gadaisawah') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Belum Diverifikasi</span>
                  </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('sedang.gadaisawah') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Sedang Tergadai</span>
                  </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('riwayat.gadaisawah') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Riwayat Gadai</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel " data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text top-text-nav">Penjualan</span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
              <ul class="kt-menu__subnav">
                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
                  <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">Alat</span>
                    <i class="kt-menu__hor-arrow la la-angle-right"></i>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                    <ul class="kt-menu__subnav">
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('index.alat') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Data Alat</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('index.talat') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Transaksi Alat</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('riwayat.talat') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Riwayat Transaksi</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
                  <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">Bibit & Pupuk</span>
                    <i class="kt-menu__hor-arrow la la-angle-right"></i>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                    <ul class="kt-menu__subnav">
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="#" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Data Bibit & Pupuk</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="#" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Transaksi Bibit & Pupuk</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="#" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Riwayat Transaksi</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
                  <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">Beras</span>
                    <i class="kt-menu__hor-arrow la la-angle-right"></i>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                    <ul class="kt-menu__subnav">
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('index.beras') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Data Beras</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('index.tberas') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Transaksi Beras</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('riwayat.tberas') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Riwayat Transaksi</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>

          <li class="kt-menu__item kt-menu__item--rel {{ request()->is('admin/manage-admin') ? 'kt-menu__item--open kt-menu__item--here' : '' }}">
            <a href="{{ route('index.manage-admin') }}" class="kt-menu__link" id="manageadmin">
              <span class="kt-menu__link-text kt-menu__link-text {{ request()->is('admin/manage-admin') ? '' : 'top-text-nav' }}">Manage Admin</span>
            </a>
          </li>

          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ request()->is('admin/manage-user-konsumen') || request()->is('admin/manage-user-petani-verified') || request()->is('admin/manage-user-petani-unverified') ? 'kt-menu__item--open kt-menu__item--here' : '' }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle" id="manageuser">
              <span class="kt-menu__link-text {{ request()->is('admin/manage-user-konsumen') || request()->is('admin/manage-user-petani-verified') || request()->is('admin/manage-user-petani-unverified') ? '' : 'top-text-nav' }}">Manage User</span>
              <i class="fa fa-angle-down {{ request()->is('admin/manage-user-konsumen') || request()->is('admin/manage-user-petani-verified') || request()->is('admin/manage-user-petani-unverified') ? 'icon-here' : '' }}"></i>
            </a>
            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
              <ul class="kt-menu__subnav">
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('konsumen.manage-user') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Konsumen</span>
                  </a>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
                  <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">Petani</span>
                    <i class="kt-menu__hor-arrow la la-angle-right"></i>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                    <ul class="kt-menu__subnav">
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('verified.manage-user') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Terverifikasi</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('unverified.manage-user') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Belum Terverifikasi</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <!-- end: Header Menu -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar kt-grid__item">

      <!--begin: Search -->
      <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
        <div class="kt-header__topbar-wrapper search-topbar" data-toggle="dropdown" data-offset="10px,0px">
          <span class="kt-header__topbar-icon"><i class="flaticon2-search-1"></i></span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
          <div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
            <form method="get" class="kt-quick-search__form">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
              </div>
            </form>
            <div class="kt-quick-search__wrapper kt-scroll ps" data-scroll="true" data-height="325" data-mobile-height="200" style="height: 325px; overflow: hidden;">
              <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
              </div>
              <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--end: Search -->

      <!--begin: User bar -->
      <div class="kt-header__topbar-item kt-header__topbar-item--user user-topbar">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
          <span class="kt-header__topbar-welcome kt-visible-desktop">Hi,</span>
          <span class="kt-header__topbar-username kt-visible-desktop">{{ Auth::guard('admin')->user()->name }}</span>
          <img alt="Pic" src="{{ asset('assets/media/users/300_21.jpg') }}">
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

          <!--begin: Head -->
          <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
            <div class="kt-user-card__avatar">
              <img class="kt-hidden-" alt="Pic" src="{{ asset('assets/media/users/300_21.jpg') }}">
            </div>
            <div class="kt-user-card__name">
              {{ Auth::guard('admin')->user()->name }}
            </div>
            <div class="kt-user-card__badge">
              <span>
                <a href="{{ route('admin.logout') }}" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold btn-logout-user" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </span>
            </div>
          </div>
          <!--end: Head -->
        </div>
      </div>
      <!--end: User bar -->

    </div>

    <!-- end:: Header Topbar -->
  </div>
</div>