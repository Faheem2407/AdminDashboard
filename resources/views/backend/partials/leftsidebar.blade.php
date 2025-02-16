<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin-dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-file-manager">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-file-manager">Users List</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-invoices">Informations</span>
                    </a>
                    <ul class="sub-menu {{ request()->is('blogs*') ? 'mm-show' : '' }}" aria-expanded="false">
                        {{-- <li><a href="{{ route('site-infos.index') }}" key="t-invoice-list">Company Informations</a></li> --}}

                        <!-- Company Informations Menu with Active Class -->
                        <li class="{{ request()->is('site-infos*') ? 'mm-active' : '' }}">
                            <a href="{{ route('site-infos.index') }}" key="t-invoice-detail">Company Informations</a>
                        </li>
                        <!-- Platform Informations Menu with Active Class -->
                        <li class="{{ request()->is('platforms*') ? 'mm-active' : '' }}">
                            <a href="{{ route('platforms.index') }}" key="t-invoice-detail">Platform Informations</a>
                        </li>

                        <!-- available card amounts menu with active class -->
                        <li class="{{ request()->is('amounts*') ? 'mm-active' : '' }}">
                            <a href="{{ route('amounts.index') }}" key="t-invoice-detail">Available Card Amounts</a>
                        </li>
                        
                        <!-- available card versions menu with active class -->
                        <li class="{{ request()->is('versions*') ? 'mm-active' : '' }}">
                            <a href="{{ route('versions.index') }}" key="t-invoice-detail">Available Card Versions</a>
                        </li>

                        <!-- Card Informations Menu with Active Class -->
                        <li class="{{ request()->is('cards*') ? 'mm-active' : '' }}">
                            <a href="{{ route('cards.index') }}" key="t-invoice-detail">Card Informations</a>
                        </li>
                        
                        <!-- Blog Menu with Active Class -->
                        <li class="{{ request()->is('blogs*') ? 'mm-active' : '' }}">
                            <a href="{{ route('blogs.index') }}" key="t-invoice-detail">Blogs</a>
                        </li>

                    </ul>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
