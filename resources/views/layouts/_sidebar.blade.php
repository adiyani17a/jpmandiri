<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ asset('assets/image/faces/face1.jpg') }} " alt="profile">
          <span class="login-status online"></span> <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small">{{ Auth::user()->jabatan->nama }}</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#utility" aria-expanded="false" aria-controls="utility">
        <span class="menu-title">Setting Utility</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi mdi-settings menu-icon"></i>
      </a>
      <div class="collapse" id="utility">
        <ul class="nav flex-column sub-menu">
          @if (Auth::user()->akses('setting group menu','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('group_menu') }}">Setting Group Menu</a></li>@endif
          @if (Auth::user()->akses('setting daftar menu','aktif'))<li class="nav-item"> <li class="nav-item"> <a class="nav-link" href="{{ route('daftar_menu') }}">Setting Daftar Menu</a></li>@endif
          @if (Auth::user()->akses('setting hak akses','aktif'))<li class="nav-item"> <li class="nav-item"> <a class="nav-link" href="{{ route('hak_akses') }}">Setting Hak Akses</a></li>@endif
          @if (Auth::user()->akses('setting user','aktif'))<li class="nav-item"> <li class="nav-item"> <a class="nav-link" href="{{ route('user') }}">Setting User</a></li>@endif
          @if (Auth::user()->akses('setting jabatan','aktif'))<li class="nav-item"> <li class="nav-item"> <a class="nav-link" href="{{ route('jabatan') }}">Setting Jabatan</a></li>@endif
          @if (Auth::user()->akses('setting database','aktif'))<li class="nav-item"> <li class="nav-item"> <a class="nav-link" href="{{ route('database') }}">Setting Database</a></li>@endif
          @if (Auth::user()->akses('setting perusahaan','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('perusahaan') }}">Setting Perusahaan</a></li>@endif
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#settingKeuangan" aria-expanded="false" aria-controls="settingKeuangan">
        <span class="menu-title">Setting Keuangan</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-chart-areaspline menu-icon"></i>
      </a>
      <div class="collapse" id="settingKeuangan">
        <ul class="nav flex-column sub-menu">
          @if (Auth::user()->akses('setting tambah periode','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('tambah_periode') }}">Setting Tambah Periode</a></li>@endif
          @if (Auth::user()->akses('setting periode','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('periode') }}">Setting Periode</a></li>@endif
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#master_bersama" aria-expanded="false" aria-controls="master_bersama">
        <span class="menu-title">Master Bersama</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-adjust menu-icon"></i>
      </a>
      <div class="collapse" id="master_bersama">
        <ul class="nav flex-column sub-menu">
          @if (Auth::user()->akses('master provinsi','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('provinsi') }}">Master Provinsi</a></li>@endif
          @if (Auth::user()->akses('master kota','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('kota') }}">Master Kota</a></li>@endif
          @if (Auth::user()->akses('master kecamatan','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('kecamatan') }}">Master Kecamatan</a></li>@endif
          @if (Auth::user()->akses('master desa','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('desa') }}">Master Desa</a></li>@endif
          @if (Auth::user()->akses('master cabang','aktif'))<li class="nav-item"> <li class="nav-item"> <a class="nav-link" href="{{ route('cabang') }}">Master Cabang</a></li>@endif
          @if (Auth::user()->akses('master pegawai','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('pegawai') }}">Master Pegawai</a></li>@endif
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#master_keuangan" aria-expanded="false" aria-controls="master_keuangan">
        <span class="menu-title">Master Akuntansi</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-chart-arc menu-icon"></i>
      </a>
      <div class="collapse" id="master_keuangan">
        <ul class="nav flex-column sub-menu">
          @if (Auth::user()->akses('master group akun','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('group_akun') }}">Master Group Akun</a></li>@endif
          @if (Auth::user()->akses('master akun','aktif'))<li class="nav-item"> <a class="nav-link" href="{{ route('akun') }}">Master Akun</a></li>@endif
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/forms/basic_elements.html">
        <span class="menu-title">Forms</span>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Charts</span>
        <i class="mdi mdi-chart-bar menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/tables/basic-table.html">
        <span class="menu-title">Tables</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
        <span class="menu-title">Sample Pages</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-medical-bag menu-icon"></i>
      </a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>