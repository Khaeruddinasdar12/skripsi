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

          <!-- dashboard menu -->
          <li class="kt-menu__item kt-menu__item--rel {{ request()->is('admin') ? 'kt-menu__item--open kt-menu__item--here' : '' }}">
            <a href="{{ route('admin.home') }}" class="kt-menu__link">
              <span class="kt-menu__link-text {{ request()->is('admin') ? '' : 'top-text-nav' }}">Dashboard</span>
            </a>
          </li>
          <!-- end dashboard menu -->

          <!-- gabah menu -->
          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ request()->is('admin/gabah') || request()->is('admin/transaksi-gabah') || request()->is('admin/riwayat-transaksi-gabah') ? 'kt-menu__item--open kt-menu__item--here' : '' }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text {{ request()->is('admin/gabah') || request()->is('admin/transaksi-gabah') || request()->is('admin/riwayat-transaksi-gabah') ? '' : 'top-text-nav' }}">Gabah</span>
              <i class=" fa fa-angle-down {{ request()->is('admin/gabah') || request()->is('admin/transaksi-gabah') || request()->is('admin/riwayat-transaksi-gabah') ? 'icon-here' : '' }}"></i>
            </a>
            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
              <ul class="kt-menu__subnav">
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('index.gabah') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Data Gabah</span>
                  </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('index.tgabah') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Transaksi Gabah</span>
                  </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('riwayat.tgabah') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Riwayat Transaksi</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- end and gabah -->

          <!-- modal tanam menu -->
          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ request()->is('admin/modal-tanam-daftar-gadai') || request()->is('admin/modal-tanam-sedang-gadai') || request()->is('admin/modal-tanam-riwayat-gadai') ? 'kt-menu__item--open kt-menu__item--here' : '' }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle" id="modaltanam">
              <span class="kt-menu__link-text {{ request()->is('admin/modal-tanam-daftar-gadai') || request()->is('admin/modal-tanam-sedang-gadai') || request()->is('admin/modal-tanam-riwayat-gadai') ? '' : 'top-text-nav' }}">Modal Tanam</span>
              <i class="fa fa-angle-down {{ request()->is('admin/modal-tanam-daftar-gadai') || request()->is('admin/modal-tanam-sedang-gadai') || request()->is('admin/mdoal-tanam-riwayat-gadai') ? 'icon-here' : '' }} "></i>
            </a>
            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
              <ul class="kt-menu__subnav">
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('daftar.modaltanam') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Belum Diverifikasi</span>
                  </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('sedang.modaltanam') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Sedang Tergadai</span>
                  </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu">
                  <a href="{{ route('riwayat.modaltanam') }}" class="kt-menu__link">
                    <span class="kt-menu__link-text">Riwayat Gadai</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- end modal tanam -->

          <!-- sawah menu -->
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
          <!-- end sawah -->

          <!-- penjualan menu -->
          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel {{ request()->is('admin/alat') || request()->is('admin/transaksi-alat') || request()->is('admin/riwayat-transaksi-alat') || request()->is('admin/beras') || request()->is('admin/transaksi-beras') || request()->is('admin/riwayat-transaksi-beras') || request()->is('admin/bibit') || request()->is('admin/transaksi-bibit') || request()->is('admin/riwayat-transaksi-bibit') || request()->is('admin/pupuk') || request()->is('admin/transaksi-pupuk') || request()->is('admin/riwayat-transaksi-pupuk')  ? 'kt-menu__item--open kt-menu__item--here' : '' }}" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text {{ request()->is('admin/alat') || request()->is('admin/transaksi-alat') || request()->is('admin/riwayat-transaksi-alat') || request()->is('admin/beras') || request()->is('admin/transaksi-beras') || request()->is('admin/riwayat-transaksi-beras') || request()->is('admin/bibit') || request()->is('admin/transaksi-bibit') || request()->is('admin/riwayat-transaksi-bibit') || request()->is('admin/pupuk') || request()->is('admin/transaksi-pupuk') || request()->is('admin/riwayat-transaksi-pupuk')  ? '' : 'top-text-nav' }}">Penjualan</span>
              <i class="fa fa-angle-down {{ request()->is('admin/alat') || request()->is('admin/transaksi-alat') || request()->is('admin/riwayat-transaksi-alat') || request()->is('admin/beras') || request()->is('admin/transaksi-beras') || request()->is('admin/riwayat-transaksi-beras') || request()->is('admin/bibit') || request()->is('admin/transaksi-bibit') || request()->is('admin/riwayat-transaksi-bibit') || request()->is('admin/pupuk') || request()->is('admin/transaksi-pupuk') || request()->is('admin/riwayat-transaksi-pupuk') ? 'icon-here' : '' }}"></i>
            </a>
            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
              <ul class="kt-menu__subnav">
                <!-- alat -->
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
                <!-- end alat -->

                <!-- bibit -->
                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
                  <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">Bibit</span>
                    <i class="kt-menu__hor-arrow la la-angle-right"></i>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                    <ul class="kt-menu__subnav">
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('index.bibit') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Data Bibit</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('index.tbibit') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Transaksi Bibit</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('riwayat.tbibit') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Riwayat Transaksi</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- end bibit -->

                <!-- pupuk -->
                <li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
                  <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">Pupuk</span>
                    <i class="kt-menu__hor-arrow la la-angle-right"></i>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                    <ul class="kt-menu__subnav">
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('index.pupuk') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Data Pupuk</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('index.tpupuk') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Transaksi Pupuk</span>
                        </a>
                      </li>
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{ route('riwayat.tpupuk') }}" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">Riwayat Transaksi</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- end pupuk -->

                <!-- beras -->
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
                <!-- end beras -->
              </ul>
            </div>
          </li>
          <!-- end penjualan -->

          <!-- manage admin menu -->
          <li class="kt-menu__item kt-menu__item--rel {{ request()->is('admin/manage-admin') ? 'kt-menu__item--open kt-menu__item--here' : '' }}">
            <a href="{{ route('index.manage-admin') }}" class="kt-menu__link" id="manageadmin">
              <span class="kt-menu__link-text kt-menu__link-text {{ request()->is('admin/manage-admin') ? '' : 'top-text-nav' }}">Manage Admin</span>
            </a>
          </li>
          <!-- end manage admin -->


          <!-- manage user menu -->
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
          <!-- end manage user -->

          <!-- laporan menu -->
          <li class="kt-menu__item kt-menu__item--rel {{ request()->is('admin/laporan') ? 'kt-menu__item--open kt-menu__item--here' : '' }}">
            <a href="{{route('index.laporan')}}" class="kt-menu__link">
              <span class="kt-menu__link-text {{ request()->is('admin/laporan') ? '' : 'top-text-nav' }}">Laporan</span>
            </a>
          </li>
          <!-- end laporan menu -->

        </ul>
      </div>
    </div>

    <!-- end: Header Menu -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar kt-grid__item">

      <!--begin: User bar -->
      <div class="kt-header__topbar-item kt-header__topbar-item--user user-topbar">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
          <span class="kt-header__topbar-username kt-visible-desktop"><i class="fa fa-angle-down"></i></span>
          <img alt="Pic" src="{{ asset('img/user.png') }}">
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

          <!--begin: Head -->
          <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
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