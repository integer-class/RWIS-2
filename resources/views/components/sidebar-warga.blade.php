
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

            
            <li class="{{ $type_menu === 'komplain'? 'active' : ''  }}">
                <a class="nav-link active"
                    href="{{ route('warga_komplain.index') }}"><i class="fas fa-exclamation"></i> <span>Komplain</span></a>
            </li>
            
            <li class="{{ $type_menu === 'pengumuman'? 'active' : ''  }}">
                <a class="nav-link active"
                    href="{{ route('warga_pengumuman.index') }}"><i class="fas fa-exclamation"></i> <span>Pengumuman</span></a>
            </li>
        </ul>

      
    </aside>
</div>
