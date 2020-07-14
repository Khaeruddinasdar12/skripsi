<div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
  <div class="kt-container  kt-container--fluid ">

    <!-- begin: Header Menu -->
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn">
      <i class="la la-close"></i>
    </button>
    <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
      <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
        <ul class="kt-menu__nav ">

          <li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text">Dashboard</span>
            </a>
          </li>

          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text">Components</span>
              <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
              <ul class="kt-menu__subnav">
                <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true">
                  <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon2-start-up"></i>
                    <span class="kt-menu__link-text">Base</span>
                    <i class="kt-menu__hor-arrow la la-angle-right"></i>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
                  <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                    <ul class="kt-menu__subnav">
                      <li class="kt-menu__item " aria-haspopup="true">
                        <a href="components/base/colors.html" class="kt-menu__link ">
                          <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="kt-menu__link-text">State Colors</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>

          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text">Crud</span>
              <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
          </li>

          <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text">Apps</span>
              <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
          </li>

          <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
              <span class="kt-menu__link-text">Pages</span>
              <i class="kt-menu__ver-arrow la la-angle-right"></i>
            </a>
          </li>

        </ul>
      </div>
    </div>

    <!-- end: Header Menu -->

    <!-- begin:: Brand -->
    <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
      <a class="kt-header__brand-logo" href="?page=index">
        <img alt="Logo" src="assets/media/logos/logo-9.png">
      </a>
    </div>

    <!-- end:: Brand -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar kt-grid__item">

      <!--begin: Search -->
      <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
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
      <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
          <span class="kt-header__topbar-welcome kt-visible-desktop">Hi,</span>
          <span class="kt-header__topbar-username kt-visible-desktop">Admin</span>
          <img alt="Pic" src="assets/media/users/300_21.jpg">

          <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
          <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

          <!--begin: Head -->
          <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
            <div class="kt-user-card__avatar">
              <img class="kt-hidden-" alt="Pic" src="assets/media/users/300_25.jpg">

              <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
              <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
            </div>
            <div class="kt-user-card__name">
              Sean Stone
            </div>
            <div class="kt-user-card__badge">
              <span>
                <a href="custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
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