
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">RWKU</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RW</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ $type_menu === 'dashboard'? 'active' : ''  }}">

                <a class="nav-link active"
                    href="{{ route('dashboard.index') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            
            <li class="menu-header">Data</li>
            <li class="nav-item dropdown {{ ($type_menu === 'penduduk' || $type_menu === 'kartu-keluarga') ? 'active' : ($type_menu === 'detail_penduduk' ? 'active' : '') }}">
            
            {{-- <li class="nav-item dropdown {{ Request::is('rw/penduduk') ? 'active' : '' }}"> --}}
                
                <a href="#"
                    class="nav-link has-dropdown" 
                    data-toggle="dropdown"><i class="fas fa-users"></i> <span>Penduduk</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class='{{ Request::is('rw/penduduk') ? 'active' : '' }}'> --}}
                    <li class='{{ $type_menu === 'penduduk' || $type_menu === 'detail_penduduk' ? 'active' : ''  }}'>
                        <a class="nav-link" href="{{ route('penduduk.index') }}">Data Penduduk</a>
                    </li>
                    <li class='{{ $type_menu === 'kartu-keluarga' ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('kartu-keluarga.index') }}">Data Kartu Keluarga</a>
                    </li>
                  
                </ul>
            </li>

            

            <li class="nav-item dropdown {{ $type_menu === 'bansos'  ? 'active' : '' }} ">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-heart"></i> <span>Bansos</span></a>
                    <ul class="dropdown-menu" >
                      
                    <li class="{{ $type_menu === 'bansos'? 'active' : ''}}">
                        <a class="nav-link"
                            href="{{ route('bansos.index') }}">Data Bansos</a>
                    </li>
                    

                </ul>
            </li>
            <li class="nav-item dropdown {{ ($type_menu === 'iuran' || $type_menu === 'form_pengeluaran'  ? 'active' : '') }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Iuran</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ $type_menu === 'iuran'? 'active' : ''}}">
                        <a class="nav-link"
                            href="{{ route('iuran.index') }}">Data Iuran</a>
                    </li>
                    <li class="{{ $type_menu === 'form_pengeluaran'? 'active' : ''}}">
                        <a class="nav-link"
                            href="{{ route('iuran.create') }}">Form Pengeluaran</a>
                    </li>
                    

                </ul>
            </li>
            <li class="menu-header">Pendukung</li>

             <li class="{{ $type_menu === 'komplain'? 'active' : ''  }}">
                <a class="nav-link active"
                    href="{{ route('komplain.index') }}"><i class="fas fa-exclamation"></i> <span>Komplain</span></a>
            </li>

            <li class="{{ $type_menu === 'pengumuman'? 'active' : ''  }}">
                <a class="nav-link"
                    href="{{ route('pengumuman.index') }}"><i class="fa fa-clipboard"></i> <span>Pengumuman</span></a>
            </li>

            <li class="{{ $type_menu === 'dokumentasi'? 'active' : ''  }}">
                <a class="nav-link"
                    href="{{ route('dokumentasi.index') }}"><i class="fa fa-camera"></i> <span>Dokumentasi</span></a>
            </li>


            <li class="{{ $type_menu === 'arsip'? 'active' : ''  }}">
                <a class="nav-link"
                    href="{{ route('arsip.index') }}"><i class="fa fa-trash"></i> <span>Arsip</span></a>
            </li>

        </ul>
    </aside>
</div>
