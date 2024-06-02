
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
            <li class="{{ $type_menu === 'dashboard'? 'active' : ''  }}">

                <a class="nav-link active"
                    href="{{ route('warga_dashboard.index') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            
            <li class="{{ $type_menu === 'komplain'? 'active' : ''  }}">
                <a class="nav-link active"
                    href="{{ route('warga_komplain.index') }}"><i class="fas fa-exclamation"></i> <span>Komplain</span></a>
            </li>
            
            <li class="{{ $type_menu === 'pengumuman'? 'active' : ''  }}">
                <a class="nav-link active"
                    href="{{ route('warga_pengumuman.index') }}"><i class="fa fa-clipboard"></i> <span>Pengumuman</span></a>
            </li>
        </ul>

      
    </aside>
</div>
