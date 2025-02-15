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
                            {{-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-detail"></i>
                                    <span key="t-invoices">Users</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('site-infos.index') }}" key="t-invoice-list">Users List</a></li>
                                    <li><a href="{{ route('platforms.index') }}" key="t-invoice-detail"></a></li>
                                    <li><a href="{{ route('cards.index') }}" key="t-invoice-detail">Cards</a></li>
                                    <li><a href="{{ route('amounts.index') }}" key="t-invoice-detail">Available Card Amounts</a></li>
                                    <li><a href="{{ route('versions.index') }}" key="t-invoice-detail">Card Versions</a></li>
                                    <li><a href="{{ route('blogs.index') }}" key="t-invoice-detail">Blogs</a></li>
                                </ul>
                            </li> --}}
                            {{-- =================================================== --}}
                            {{-- Dashboard --}}
                            {{-- =================================================== --}}
                            {{-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboards</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="index.html" key="t-default">Default</a></li>
                                    <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
                                    <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
                                    <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li>
                                    <li><a href="dashboard-job.html"><span
                                                class="badge rounded-pill text-bg-success float-end"
                                                key="t-new">New</span> <span key="t-jobs">Jobs</span></a></li>
                                </ul>
                            </li> --}}







                            {{-- ================================================ --}}
                            {{-- Admin Dashboard --}}
                            {{-- ================================================ --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-detail"></i>
                                    <span key="t-invoices">Informations</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('site-infos.index') }}" key="t-invoice-list">Company Informations</a></li>
                                    <li><a href="{{ route('platforms.index') }}" key="t-invoice-detail">Platforms</a></li>
                                    <li><a href="{{ route('cards.index') }}" key="t-invoice-detail">Cards</a></li>
                                    <li><a href="{{ route('amounts.index') }}" key="t-invoice-detail">Available Card Amounts</a></li>
                                    <li><a href="{{ route('versions.index') }}" key="t-invoice-detail">Card Versions</a></li>
                                    <li><a href="{{ route('blogs.index') }}" key="t-invoice-detail">Blogs</a></li>
                                </ul>
                            </li>

                            <li class="menu-title" key="t-pages">Pages</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-user-circle"></i>
                                    <span key="t-authentication">Authentication</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="auth-login.html" key="t-login">Login</a></li>
                                    <li><a href="auth-register.html" key="t-register">Register</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
