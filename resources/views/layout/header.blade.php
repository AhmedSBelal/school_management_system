<nav class="app-header navbar navbar-expand bg-b    dy"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
                        class="bi bi-list"></i> </a> </li>
        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Messages Dropdown Menu-->
            <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
                        class="bi bi-chat-text"></i> <span class="navbar-badge badge text-bg-danger">3</span> </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img src="../../dist/assets/img/user1-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-end fs-7 text-danger"><i class="bi bi-star-fill"></i></span>
                                </h3>
                                <p class="fs-7">Call me whenever you can...</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img src="../../dist/assets/img/user8-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-end fs-7 text-secondary"> <i class="bi bi-star-fill"></i> </span>
                                </h3>
                                <p class="fs-7">I got your message bro</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <!--begin::Message-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"> <img src="../../dist/assets/img/user3-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 rounded-circle me-3"> </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-end fs-7 text-warning"> <i class="bi bi-star-fill"></i> </span>
                                </h3>
                                <p class="fs-7">The subject goes here</p>
                                <p class="fs-7 text-secondary"> <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div> <!--end::Message-->
                    </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">See All
                        Messages</a>
                </div>
            </li> <!--end::Messages Dropdown Menu--> <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown"> <a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
                        class="bi bi-bell-fill"></i> <span class="navbar-badge badge text-bg-warning">15</span> </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <span
                        class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-envelope me-2"></i> 4 new messages
                        <span class="float-end text-secondary fs-7">3 mins</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-people-fill me-2"></i> 8 friend requests
                        <span class="float-end text-secondary fs-7">12 hours</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"> <i
                            class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                        <span class="float-end text-secondary fs-7">2 days</span> </a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item dropdown-footer">
                        See All Notifications
                    </a>
                </div>
            </li> <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->
            <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i
                        data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize"
                        class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li>
            <!--end::Fullscreen Toggle-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav>



<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="#" class="brand-link" style="text-align: center;">
            <!--begin::Brand Text-->
            <span class="brand-text fw-light" style="font-weight: bold; !important font-size: 20px; ">School</span>
            <!--end::Brand Text-->
        </a> <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar account-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::account Image-->
            {{-- <img src="../../dist/assets/img/user1-128x128.jpg" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"> --}}
                <img src="{{asset('dist/assets/img/user1-128x128.jpg')}}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow">
            <!--end::account Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">{{ Auth::user()->name }}</span>
            <!--end::Brand Text-->
        </a> <!--end::Brand Link-->
    </div>
    <!--end::Sidebar account-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->

            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                data-accordion="false">

                @if (Auth::user()->role == 1)
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link
                        {{ Request::segment(2) == 'dashboard' ? '' : 'active' }}">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>

                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/admin/list') }}" class="nav-link
                        {{ Request::segment(2) == 'admin' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Admins
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/teacher/list') }}" class="nav-link
                        {{ Request::segment(2) == 'teacher' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Teachers
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/student/list') }}" class="nav-link
                        {{ Request::segment(2) == 'student' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Students
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/parent/list') }}" class="nav-link
                        {{ Request::segment(2) == 'parent' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Parents
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/class/list') }}" class="nav-link
                        {{ Request::segment(2) == 'class' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Class
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/subject/list') }}" class="nav-link
                        {{ Request::segment(2) == 'subject' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Subject
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/assign_subject/list') }}" class="nav-link
                        {{ Request::segment(2) == 'assign_subject' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Assign Subject
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('admin/change_password') }}" class="nav-link
                        {{ Request::segment(2) == 'change_password' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Change Password
                            </p>
                        </a>
                    </li>
                @elseif (Auth::user()->role == 2)
                    <li class="nav-item menu-open">
                        <a href="{{ url('teacher/dashboard') }}" class="nav-link
                        {{ Request::segment(2) == 'dashboard' ? '' : 'active' }}">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('teacher/account') }}" class="nav-link
                        {{ Request::segment(2) == 'account' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                My Account
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('teacher/change_password') }}" class="nav-link
                        {{ Request::segment(2) == 'change_password' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Change Password
                            </p>
                        </a>
                    </li>
                @elseif (Auth::user()->role == 3)
                    <li class="nav-item menu-open">
                        <a href="{{ url('student/dashboard') }}" class="nav-link
                        {{ Request::segment(2) == 'dashboard' ? '' : 'active' }}">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('student/account') }}" class="nav-link
                        {{ Request::segment(2) == 'account' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                My Account
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('student/change_password') }}" class="nav-link
                        {{ Request::segment(2) == 'change_password' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Change Password
                            </p>
                        </a>
                    </li>
                @elseif (Auth::user()->role == 4)
                    <li class="nav-item menu-open">
                        <a href="{{ url('parent/dashboard') }}" class="nav-link
                        {{ Request::segment(2) == 'dashboard' ? '' : 'active' }}">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>

                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('parent/account') }}" class="nav-link
                        {{ Request::segment(2) == 'account' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                My Account
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="{{ url('parent/change_password') }}" class="nav-link
                        {{ Request::segment(2) == 'change_password' ? '' : 'active' }}">
                            <i class="bi bi-person"></i>
                            <p>
                                Change Password
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item menu-open">
                    <a href="{{ url('logout') }}" class="nav-link active">
                        <i class="bi bi-person"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul> <!--end::Sidebar Menu-->

        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside>