<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="/" class="app-brand-link">
      <img src="{{ asset('member/img/logo/dark-logo.png') }}" class="w-100 p-3" alt="">
    </a>
    <a href="/" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
    <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ ($title == 'Dashboard') ? 'active' : '' }}">
      <a href="/v1/home" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <!-- Layouts -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li>
    <li class="menu-item {{ ($title == 'Settings' || $title == 'Accounts') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Account Settings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ ($title == 'Accounts') ? 'active' : '' }}">
          <a href="/v1/accounts" class="menu-link">
            <div data-i18n="Account">Account</div>
          </a>
        </li>
        <li class="menu-item {{ ($title == 'Settings') ? 'active' : '' }}">
          <a href="/v1/settings" class="menu-link">
            <div data-i18n="Settings">Settings</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item {{ ($title == 'Banners' || $title == 'Categories' || $title == 'Roles' || $title == 'Member Packages') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
        <div data-i18n="Master">Master</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ ($title == 'Banners') ? 'active' : '' }}">
          <a href="/v1/banners" class="menu-link">
            <div data-i18n="Banners">Banners</div>
          </a>
        </li>
        <li class="menu-item {{ ($title == 'Member Packages') ? 'active' : '' }}">
          <a href="/v1/mastermembers" class="menu-link">
            <div data-i18n="Member Packages">Member Packages</div>
          </a>
        </li>
        <li class="menu-item {{ ($title == 'Categories') ? 'active' : '' }}">
          <a href="/v1/categories" class="menu-link">
            <div data-i18n="Categories">Categories</div>
          </a>
        </li>
        <li class="menu-item {{ ($title == 'Roles') ? 'active' : '' }}">
          <a href="/v1/roles" class="menu-link">
            <div data-i18n="Roles">Roles</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Sub Master</span></li>
    <!-- Cards -->
    <li class="menu-item {{ ($title == 'Membership') ? 'active' : '' }}">
      <a href="/v1/memberships" class="menu-link">
        <i class="menu-icon tf-icons bx bx-collection"></i>
        <div data-i18n="Basic">Membership</div>
      </a>
    </li>
    <!-- User interface -->
    <li class="menu-item {{ ($title == 'Master Books' || $title == 'Most Viewed Books') ? 'active open' : '' }}">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div data-i18n="Master Books">Book Master</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ ($title == 'Master Books') ? 'active' : '' }}">
          <a href="/v1/books" class="menu-link">
            <div data-i18n="Master Books">Books</div>
          </a>
        </li>
        {{-- <li class="menu-item {{ ($title == 'Purchase Orders') ? 'active' : '' }}">
          <a href="/purchase_orders" class="menu-link">
            <div data-i18n="Purchases Orders ">Book Ratings </div>
          </a>
        </li> --}}
        <li class="menu-item {{ ($title == 'Most Viewed Books') ? 'active' : '' }}">
          <a href="/v1/mostviewedbooks" class="menu-link">
            <div data-i18n="Most Viewed Books ">Most Viewed </div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Extended components -->
    <li class="menu-item {{ ($title == 'Book Reviews') ? 'active open' : '' }}">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-copy"></i>
        <div data-i18n="Reviews Master">Review Master</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ ($title == 'Book Reviews') ? 'active' : '' }}">
          <a href="/v1/bookreviews" class="menu-link">
            <div data-i18n="Reviews">Book Reviews</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">About</span></li>
    <li class="menu-item">
      <a
        href="https://api.whatsapp.com/send?phone=6285234637956&text="
        target="_blank"
        class="menu-link"
        >
        <i class="menu-icon tf-icons bx bx-support"></i>
        <div data-i18n="Support">Support</div>
      </a>
    </li>
    <li class="menu-item">
      <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="menu-link bg-white border-0">
          <i class="menu-icon tf-icons bx bx-power-off"></i>
          <div data-i18n="Documentation">Log Out</div>
        </button>
      </form>
    </li>
  </ul>
</aside>
