<div class="main-sidebar sidebar-style-2">
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="">Stisla</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="#">St</a>
  </div>
  <ul class="sidebar-menu">
    <hr>
    <li class="{{ request()->is('pages/backend/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ url('pages/backend/dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>

    <!-- <li class="menu-header">Data Master</li> -->
    {{-- <li class="{{ strpos(request()->url(),'dashboard/user') ? 'active' : '' }}"><a href="{{ url('dashboard/user') }}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li> --}}
            
    
    <li class="menu-header">Publikasi 2</li>
    <li class="nav-item dropdown">
        <a href="#"
        class="nav-link has-dropdown"
        data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layanan Alumni</span></a>
        <ul class="dropdown-menu">
            <li class="{{ Request::is('layout-default-layout') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('layout-default-layout') }}">Lowongan Kerja</a>
            </li>
            <li class="{{ Request::is('transparent-sidebar') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('transparent-sidebar') }}">Lowongan Magang</a>
            </li>
            <li class="{{ Request::is('transparent-sidebar') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('transparent-sidebar') }}">Career Class</a>
            </li>
        </ul>
    </li>
    

    <hr>
    <li><a class="nav-link" href="/panel/logout"><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a></li>
  </ul>
</aside>
</div>

