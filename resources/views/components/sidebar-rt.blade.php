
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">RWKU</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown  ">
                
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='nav-item dropdown'>

                        
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link"function newFunc() {


    }
                            href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Data</li>
            <li class="nav-item dropdown {{ ($type_menu === 'penduduk' || $type_menu === 'kartu-keluarga') ? 'active' : ($type_menu === 'detail_penduduk' ? 'active' : '') }}">
            

                <a href="#"
                    class="nav-link has-dropdown" 
                    data-toggle="dropdown"><i class="fas fa-users"></i> <span>Penduduk</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class='{{ Request::is('rw/penduduk') ? 'active' : '' }}'> --}}
                        <li class='{{ $type_menu === 'penduduk' || $type_menu === 'detail_penduduk' ? 'active' : ''  }}'>
                            <a class="nav-link" href="{{ route('rt_penduduk.index') }}">Data Penduduk</a>
                        </li>

                        {{-- <li class='{{ $type_menu === 'kartu-keluarga'? 'active' : ''  }}'>
                            <a class="nav-link" href="{{ route('rt_kartukeluarga.index') }}">Data Kartu Keluarga</a>
                        </li>
                    --}}
                    
                    {{-- <li class="{{ Request::is('transparent-sidebar') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('transparent-sidebar') }}">Data Kematian</a>
                    </li>
                    <li class="{{ Request::is('layout-top-navigation') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('layout-top-navigation') }}">Data Kelahiran</a>
                    </li> --}}
                </ul>
            </li>

            

           
            <li class="nav-item dropdown {{ ($type_menu === 'iuran' ? 'active' : '') }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Iuran</span></a>
                <ul class="dropdown-menu">
                    
                    <li class='{{ $type_menu === 'iuran' ? 'active' : ''  }}'>
                        <a class="nav-link" href="{{ route('rt_iuran.index') }}">Data Iuran</a>
                    </li>

                </ul>
            </li>
            {{-- <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('blank-page') }}"><i class=›"fa fa-money"></i> <span>Blank Page</span></a>
            </li> --}}
            <li class="menu-header">Pendukung</li>

             <li class="nav-item dropdown {{ ($type_menu === 'komplain' ? 'active' : '') }}">
                <a class="nav-link active"
                    href="{{ route('rt_komplain.index') }}"><i class="fas fa-exclamation"></i> <span>Komplain</span></a>
            </li>

            <li class="nav-item dropdown {{ ($type_menu === 'pengumuman' ? 'active' : '') }}">
                <a class="nav-link"
                    href="{{ route('rt_pengumuman.index') }}"><i class="fa fa-clipboard"></i> <span>Pengumuman</span></a>
            </li>

            <li class="nav-item dropdown {{ ($type_menu === 'dokumentasi' ? 'active' : '') }}">
                <a class="nav-link"
                    href="{{ route('rt_dokumentasi.index') }}"><i class="fa fa-camera"></i> <span>Dokumentasi</span></a>
            </li>

        </ul>

        {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
