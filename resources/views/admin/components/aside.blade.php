<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin Area</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ Request::is('admin') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div>Dashboard</div>
        </a>
      </li>

      <!-- Layouts -->
      <li class="menu-item {{ Request::is('admin/products*') ? 'active' : '' }}">
        <a  href="{{ route('admin.product.index') }}" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Products</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{ Request::is('admin/products') ? 'active' : '' }}">
            <a href="{{ route('admin.product.index') }}" class="menu-link">
              <div data-i18n="Without menu">show products</div>
            </a>
          </li>
          <li class="menu-item {{ Request::is('admin/products/create') ? 'active' : '' }}">
            <a href="{{ route('admin.product.create') }}" class="menu-link">
              <div data-i18n="Without navbar">add product</div>
            </a>
          </li>
        </ul>
      </li>
      {{-- users --}}
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Users</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="layouts-without-menu.html" class="menu-link">
              <div data-i18n="Without menu">show Users</div>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </aside>