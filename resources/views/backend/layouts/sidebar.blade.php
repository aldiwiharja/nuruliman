<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="LogoNI">
    <div>
      <p class="app-sidebar__user-name">PONPES</p>
      <p class="app-sidebar__user-designation">NURUL IMAN</p>
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
        <a class="app-menu__item" href="#">
            <i class="app-menu__icon fa fa-user"></i>
            <span class="app-menu__label">Siswa</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item" href="{{ route('admin.program') }}">
            <i class="app-menu__icon fa fa-folder"></i>
            <span class="app-menu__label">Program</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item" href={{ route('admin.ekskul') }}>
            <i class="app-menu__icon fa fa-file"></i>
            <span class="app-menu__label">Ekskul</span>
        </a>
    </li>
    <li>
        <a class="app-menu__item" href={{ route('admin.teacher') }}>
            <i class="app-menu__icon fa fa-user"></i>
            <span class="app-menu__label">Tenaga Pendidik</span>
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