<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                <div class="mt-5 mb-2">
                <img src="{{asset('images/logo.PNG')}}" height="70">
                </div>
            </a>

            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.newjoins')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User List</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-bug"></i>
                    <span>Reports</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.verify')}}">
                    <i class="fas fa-check"></i>
                    <span>Verifications</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.paymethod')}}">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Payment Methods</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-user-tie"></i>
                    <span>Manage Memberships</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.viewpackages')}}">Packages</a>
                        <a class="collapse-item" href="{{route('admin.upgraderequest')}}">Upgrade Requests</a>
                        <a class="collapse-item" href="{{route('admin.members')}}">Member List</a>
                        <a class="collapse-item" href="{{route('admin.denied')}}">Declined Requests</a>
                        <a class="collapse-item" href="{{route('admin.history')}}">Payment History</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-address-book"></i>
                    <span>Website Details</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('websetting.titleform')}}">Website Settings</a>
                        <a class="collapse-item" href="{{route('websetting.logoform')}}">Update Logo</a>
                    </div>
                </div>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>