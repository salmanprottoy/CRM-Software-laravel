<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('assets/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('assets/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <li>
                    <a href="{{ route('superAdmin.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Administrator</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('superAdmin.superAdmin') }}">Super Admin</a></li>
                        <li><a href="{{ route('superAdmin.admin') }}">Admin</a></li>

                    </ul>
                </li>


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Subscriber</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('superAdmin.subscriber') }}">Manage Subscriber</a></li>
                        <li><a href="/supAdmin_home/feedbacks">Feedbacks</a> </li>
                        <li><a href="/supAdmin_home/verification">Verification</a> </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('superAdmin.package') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Package</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="/supAdmin_home/meeting" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Meeting</span>
                    </a>
                </li> -->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Notice</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/supAdmin_home/meeting">Meeting</a></li>
                        <li><a href="/supAdmin_home/feedbacks">Others</a></li>


                    </ul>
                </li>

                <li>

                    <a href="{{ route('superAdmin.coupon') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Coupon Management</span>
                    </a>
                </li>
                <li>

                    <a href="{{ route('superAdmin.report') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Financial Status</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
