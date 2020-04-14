<!-- Sidebar menu-->
@php
    $uri = Request::segment(1).'/'.Request::segment(2);
@endphp
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="{{ url('uploads/admin/logo/Nuruliman.png') }}" class="img-fluid" width="60" alt="LogoNI">
    <div>
      <p class="app-sidebar__user-name">NURUL IMAN</p>
      <p class="app-sidebar__user-designation">Al HASANAH</p>
    </div>
  </div>
  <ul class="app-menu">
    <li>
        <a @if ($uri == "admin/dashboard") class="app-menu__item nav-item active" @else class="app-menu__item nav-item" @endif href="{{ route('admin.dashboard') }}">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">Dashboard</span>
        </a>
    </li>
    <li>
        <a @if ($uri == "admin/siswa") class="app-menu__item nav-item active" @else class="app-menu__item nav-item" @endif href="{{ route('admin.siswa') }}">
            <i class="app-menu__icon fa fa-user"></i>
            <span class="app-menu__label">Siswa</span>
        </a>
    </li>
    <li>
        <a @if ($uri == "admin/payment") class="app-menu__item nav-item active" @else class="app-menu__item nav-item" @endif href="{{ route('admin.payment') }}">
            <i class="app-menu__icon fa fa-money"></i>
            <span class="app-menu__label">Pembayaran</span>
        </a>
    </li>
    <li @if ($uri == "admin/biaya-edit" || $uri == "admin/extrakurikuler-detail" || $uri == "admin/biaya-add" || $uri == "admin/teacher-add" || $uri == "admin/teacher-edit" || $uri == "admin/program-edit" || $uri == "admin/extrakurikuler" || $uri == "admin/extrakurikuler-add" || $uri == "admin/program-add" || $uri == "admin/program" || $uri == "admin/extrakurikuler" || $uri == "admin/teacher" || $uri == "admin/biaya" || $uri == "admin/biaya-bulanan") class="treeview is-expanded" @else class="treeview" @endif>
        <a @if ($uri == "admin/program" || $uri == "admin/extrakurikuler" || $uri == "admin/teacher" || $uri == "admin/biaya" || $uri == "admin/biaya-bulanan") class="app-menu__item active" @else class="app-menu__item" @endif href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-folder"></i>
            <span class="app-menu__label">Data Master</span>
            <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
                <a @if ($uri == "admin/program" || $uri == "admin/program-add" || $uri == "admin/program-edit") class="treeview-item nav-item active" @else class="treeview-item nav-item" @endif href="{{ route('admin.program') }}">
                  <i class="icon fa fa-circle-o"></i> Program
                </a>
            </li>
            <li>
                <a @if ($uri == "admin/extrakurikuler" || $uri == "admin/extrakurikuler-add" || $uri == "admin/extrakurikuler-detail") class="treeview-item nav-item active" @else class="treeview-item nav-item" @endif href="{{ route('admin.ekskul') }}">
                    <i class="icon fa fa-circle-o"></i> Extrakurikuler
                </a>
            </li>
            <li>
                <a @if ($uri == "admin/teacher" || $uri == "admin/teacher-add" || $uri == "admin/teacher-edit") class="treeview-item nav-item active" @else class="treeview-item nav-item" @endif href="{{ route('admin.teacher') }}">
                    <i class="icon fa fa-circle-o"></i> Tenaga Pendidik
                </a>
            </li>
            <li>
                <a @if ($uri == "admin/biaya" || $uri == "admin/biaya-add" || $uri == "admin/biaya-edit") class="treeview-item nav-item active" @else class="treeview-item nav-item" @endif href="{{ route('admin.biaya') }}">
                    <i class="icon fa fa-circle-o"></i> Biaya
                </a>
            </li>
            <li>
                <a @if ($uri == "admin/biaya-bulanan") class="treeview-item nav-item active" @else class="treeview-item nav-item" @endif href="{{ route('admin.biaya.bulanan') }}">
                    <i class="icon fa fa-circle-o"></i> Biaya Bulanan
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a @if ($uri == "admin/berita") class="app-menu__item nav-item active" @else class="app-menu__item nav-item" @endif href={{ route('admin.berita') }}>
            <i class="app-menu__icon fa fa-newspaper-o"></i>
            <span class="app-menu__label">Berita</span>
        </a>
    </li>

    <li>
        <a @if ($uri == "admin/whatsapp") class="app-menu__item nav-item active" @else class="app-menu__item nav-item" @endif href={{ route('admin.whatsapp') }}>
            <i class="app-menu__icon fa fa-whatsapp"></i>
            <span class="app-menu__label">Whatsapp Setting</span>
        </a>
    </li>

    <li>
        <a  @if ($uri == "admin/setting") class="app-menu__item nav-item active" @else class="app-menu__item nav-item" @endif href={{ route('admin.setting') }}>
            <i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">Pengaturan</span>
        </a>
    </li>

    <li>
        <a class="app-menu__item nav-item" href={{ route('admin.logout') }}>
            <i class="app-menu__icon fa fa-long-arrow-left"></i>
            <span class="app-menu__label">Keluar</span>
        </a>
    </li>

  </ul>
</aside>