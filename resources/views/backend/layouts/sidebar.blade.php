<!-- Sidebar menu-->
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
        <a class="app-menu__item" href="{{ route('admin.dashboard') }}">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">Dashboard</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item" href="{{ route('admin.siswa') }}">
            <i class="app-menu__icon fa fa-user"></i>
            <span class="app-menu__label">Siswa</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item" href="{{ route('admin.payment') }}">
            <i class="app-menu__icon fa fa-money"></i>
            <span class="app-menu__label">Pembayaran</span>
        </a>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-folder"></i><span class="app-menu__label">Data Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="{{ route('admin.program') }}">
                  <i class="icon fa fa-circle-o"></i> Program
                </a>
            </li>
            <li>
                <a class="treeview-item" href="{{ route('admin.ekskul') }}">
                    <i class="icon fa fa-circle-o"></i> Extrakurikuler
                </a>
            </li>
            <li>
                <a class="treeview-item" href="{{ route('admin.teacher') }}">
                    <i class="icon fa fa-circle-o"></i> Tenaga Pendidik
                </a>
            </li>
            <li>
                <a class="treeview-item" href="{{ route('admin.biaya') }}">
                    <i class="icon fa fa-circle-o"></i> Biaya
                </a>
            </li>
            <li>
                <a class="treeview-item" href="{{ route('admin.biaya.bulanan') }}">
                    <i class="icon fa fa-circle-o"></i> Biaya Bulanan
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a class="app-menu__item" href={{ route('admin.berita') }}>
            <i class="app-menu__icon fa fa-newspaper-o"></i>
            <span class="app-menu__label">Berita</span>
        </a>
    </li>

    <li>
        <a class="app-menu__item" href={{ route('admin.whatsapp') }}>
            <i class="app-menu__icon fa fa-whatsapp"></i>
            <span class="app-menu__label">Whatsapp Setting</span>
        </a>
    </li>

    <li>
        <a class="app-menu__item" href={{ route('admin.setting') }}>
            <i class="app-menu__icon fa fa-cogs"></i>
            <span class="app-menu__label">Setting</span>
        </a>
    </li>
  </ul>
</aside>