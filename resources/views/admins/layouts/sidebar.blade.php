<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Refrigerator Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::guard('admin')->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            カテゴリー
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.store') }}" class="nav-link {{ request()->routeIs('admin.store') || request()->routeIs('admin.store.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            店
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link {{ request()->routeIs('admin.product.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            製品
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            ユーザー
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.vending-machine.index') }}" class="nav-link {{ request()->routeIs('admin.vending-machine.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            自動販売機
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.banner.index') }}" class="nav-link {{ request()->routeIs('admin.banner.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            バナー
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.admin.index') }}" class="nav-link {{ request()->routeIs('admin.admin.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            管理者
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.version.index') }}" class="nav-link {{ request()->routeIs('admin.version.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                        バージョン管理
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.maintain.index') }}" class="nav-link {{ request()->routeIs('admin.maintain.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            維持する
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.rfid.index') }}" class="nav-link {{ request()->routeIs('admin.rfid.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            RFID
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout Options
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/boxed.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar <small>+ Custom Area</small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/fixed-topnav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/fixed-footer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/collapsed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/uplot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            UI Elements
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/buttons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/sliders.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/modals.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/navbar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/timeline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/ribbons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../forms/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/advanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/editors.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/validation.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Validation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../tables/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../tables/data.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../tables/jsgrid.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
