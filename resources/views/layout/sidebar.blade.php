<nav id="sidebar" class="sidebar">
    <div class="sidebar-brand">
        <img src="../../../assets/cc.png" width="200" height="200" alt="" style="padding-top:10px;">
        <img src="../../../assets/cc.png" class="img-sm" alt="">
    </div>
    <ul class="sidebar-menu">
        <li class="nav-item {{Request::is('dashboard') ? 'current active':'';}}">
            <a href="{{ route('dashboard.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 6 4 L 6 28 L 26 28 L 26 4 Z M 8 6 L 24 6 L 24 11 L 8 11 Z M 8 13 L 24 13 L 24 19 L 8 19 Z M 8 21 L 24 21 L 24 26 L 8 26 Z"/></svg>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 6 6 L 6 26 L 26 26 L 26 6 Z M 8 8 L 24 8 L 24 24 L 8 24 Z"/></svg>
                <span>Inventory</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu" style="display: block;">

                <li class="nav-item {{Request::is('products') ? 'current active':'';}}">
                    <a href="{{ route('product.product')}}">
                        Manage Products
                    </a>
                </li>
                <li class="nav-item {{Request::is('services') ? 'current active':'';}}">
                    <a href="{{ route('service.service')}}">
                        Manage Service
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 8.21875 5 L 8.0625 5.8125 L 7.5625 8.6875 L 7.34375 9.875 L 21.46875 9.875 L 21.15625 11.6875 L 7.03125 11.6875 L 6.875 12.5 L 6.375 15.375 L 6.15625 16.53125 L 20.28125 16.53125 L 19.5625 20.59375 L 14.34375 23 L 10.25 20.75 L 10.46875 19.53125 L 10.6875 18.375 L 5.8125 18.375 L 5.6875 19.1875 L 5 23 L 4.84375 23.75 L 5.53125 24.09375 L 13.34375 27.90625 L 13.75 28.09375 L 14.15625 27.9375 L 23.3125 24.09375 L 23.8125 23.90625 L 23.9375 23.34375 L 27 6.1875 L 27.21875 5 Z M 9.875 7 L 24.8125 7 L 22.0625 22.46875 L 13.78125 25.875 L 7.09375 22.625 L 7.5 20.375 L 8.28125 20.375 L 8.03125 21.8125 L 8.65625 22.15625 L 13.8125 25 L 14.25 25.25 L 14.71875 25.03125 L 20.875 22.1875 L 21.34375 21.96875 L 21.4375 21.4375 L 22.46875 15.71875 L 22.6875 14.53125 L 8.5625 14.53125 L 8.6875 13.6875 L 22.84375 13.6875 L 22.96875 12.84375 L 23.65625 9.03125 L 23.875 7.875 L 9.75 7.875 Z"/></svg>
                <span>Invoices & Estimates</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu" style="display:block;">

                <li class="nav-item {{Request::is('facture') ? 'current active':'';}}">
                    <a href="{{ route('facture.facture')}}">
                        Invoice
                    </a>
                </li>

                <li class="nav-item {{Request::is('estimate') ? 'current active':'';}}">
                    <a href="{{ route('estimate.estimate')}}">
                        Estimates
                    </a>
                </li>

                <li class="nav-item {{Request::is('facture/payed') ? 'current active':'';}}">
                    <a href="{{route('facture.payed')}}">
                        Payed Invoices
                    </a>
                </li>
                <li class="nav-item {{Request::is('facture/unpayed') ? 'current active':'';}}">
                    <a href="{{route('facture.unpayed')}}">
                        Unpaied Invoices
                    </a>
                </li>

                <li class="nav-item {{Request::is('delivery') ? 'current active':'';}}">
                    <a href="{{route('delivery.all')}}">
                        Deliveries
                    </a>
                </li>
                <li class="nav-item {{Request::is('discount') ? 'current active':'';}}">
                    <a href="{{route('discount.show')}}">
                        Discounts
                    </a>
                </li>
                <li class="nav-item {{Request::is('process') ? 'current active':'';}}">
                    <a href="{{ route('process.process')}}">
                        Extract data
                    </a>
                </li>

            </ul>
        </li>
        @can('view-history')
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 6 4 L 6 28 L 26 28 L 26 4 Z M 8 6 L 24 6 L 24 11 L 8 11 Z M 8 13 L 24 13 L 24 19 L 8 19 Z M 8 21 L 24 21 L 24 26 L 8 26 Z"/></svg>
                <span>History</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu " style="display:block;">
                <li class="nav-item {{Request::is('facture/trash') ? 'current active':'';}}">
                    <a href="{{route('facture.trash')}}">
                        Deleted Invoices
                    </a>
                </li>

                <li class="nav-item {{Request::is('estimate/trash') ? 'current active':'';}}">
                    <a href="{{route('estimate.trash')}}">
                        Deleted Estimates
                    </a>
                </li>
                <li class="nav-item {{Request::is('prod/trash') ? 'current active':'';}}">
                    <a href="{{route('product.trash')}}">
                        Deleted Products
                    </a>
                </li>
                <li class="nav-item {{Request::is('serv/trash') ? 'current active':'';}}">
                    <a href="{{route('service.trash')}}">
                        Deleted Services
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 6 4 L 6 28 L 26 28 L 26 4 Z M 8 6 L 24 6 L 24 11 L 8 11 Z M 8 13 L 24 13 L 24 19 L 8 19 Z M 8 21 L 24 21 L 24 26 L 8 26 Z"/></svg>
                <span>Companies</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu">
                <li class="nav-item {{Request::is('company') ? 'current active':'';}}">
                    <a href="{{route('company.company')}}">
                        Company list
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 9 4 C 7.346 4 6 5.346 6 7 C 6 8.3016094 6.8387486 9.4021391 8 9.8164062 L 8 11.304688 L 8 23.207031 L 8 27.023438 C 8 27.563438 8.4365625 28 8.9765625 28 L 9.0234375 28 C 9.5634375 28 10 27.563437 10 27.023438 L 10 22.228516 C 10.334707 21.839756 11.138423 21.046875 13.445312 21.046875 C 14.669313 21.046875 15.670422 21.473781 16.732422 21.925781 C 17.769422 22.367781 18.841891 22.824219 20.087891 22.824219 C 22.446891 22.824219 24.049375 21.584688 24.734375 21.054688 L 24.886719 20.939453 C 25.437719 20.540453 26 19.996 26 19 L 26 10.675781 C 26 9.7677812 25.221828 9 24.298828 9 C 23.803828 9 23.440406 9.2865937 22.941406 9.6835938 C 22.279406 10.207594 21.280891 11 20.087891 11 C 19.272891 11 18.477688 10.619734 17.554688 10.177734 C 16.403687 9.6257344 15.098359 9 13.443359 9 C 12.308257 9 11.421687 9.1883393 10.712891 9.4570312 C 11.489071 8.9141824 12 8.0167802 12 7 C 12 5.346 10.654 4 9 4 z M 9 6 C 9.552 6 10 6.449 10 7 C 10 7.551 9.552 8 9 8 C 8.448 8 8 7.551 8 7 C 8 6.449 8.448 6 9 6 z M 13.443359 11 C 14.645359 11 15.638406 11.476469 16.691406 11.980469 C 17.736406 12.482469 18.817891 13 20.087891 13 C 21.842891 13 23.158047 12.054484 23.998047 11.396484 L 23.998047 19.066406 C 23.997047 19.070406 23.952984 19.145266 23.708984 19.322266 L 23.509766 19.474609 C 22.942766 19.912609 21.762891 20.824219 20.087891 20.824219 C 19.249891 20.824219 18.446625 20.482937 17.515625 20.085938 C 16.372625 19.597938 15.076359 19.044922 13.443359 19.044922 C 11.891359 19.044922 10.786 19.358 10 19.75 L 10 12.361328 C 10.345 11.905328 11.132359 11 13.443359 11 z"/></svg>
                <span>Customers</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu"  style="display:block;">

                <li class="nav-item {{Request::is('client') ? 'current active':'';}}">
                    <a href="{{ route('client.client') }}">
                        Customerss</a>
                </li>

                <li class="nav-item {{Request::is('allclients') ? 'current active':'';}}">
                    <a href="{{ route('client.allclients') }}">
                        Clients
                    </a>
                </li>

                <li class="nav-item {{Request::is('allprospects') ? 'current active':'';}}">
                    <a href="{{route('client.allprospects')}}">
                       Prospects
                    </a>
                </li>
            </ul>
        </li>
        @can('edit-profile')
        <li class="header-menu">
            <span>My Profile</span>
            @endcan
        </li>
        @can('edit-profile')
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 6 3 L 6 29 L 26 29 L 26 3 Z M 8 5 L 24 5 L 24 27 L 8 27 Z M 10 7 L 10 13 L 22 13 L 22 7 Z M 12 9 L 20 9 L 20 11 L 12 11 Z M 11 15 L 11 17 L 13 17 L 13 15 Z M 15 15 L 15 17 L 17 17 L 17 15 Z M 19 15 L 19 17 L 21 17 L 21 15 Z M 11 19 L 11 21 L 13 21 L 13 19 Z M 15 19 L 15 21 L 17 21 L 17 19 Z M 19 19 L 19 21 L 21 21 L 21 19 Z M 11 23 L 11 25 L 13 25 L 13 23 Z M 15 23 L 15 25 L 17 25 L 17 23 Z M 19 23 L 19 25 L 21 25 L 21 23 Z"/></svg>
                <span>Profile</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu"  style="display:block;">

               <li class="nav-item {{Request::is('user/profile') ? 'current active':'';}}">
                    <a href="{{route('user.editProfile')}}">
                        Edit Profile                    </a>
                </li>

                <li>
                    <a href="">
                        Logout
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('view-all-users')
        <li>
            
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 5 5 L 5 27 L 27 27 L 27 5 L 5 5 z M 7 7 L 15 7 L 15 15 L 7 15 L 7 7 z M 17 7 L 25 7 L 25 15 L 17 15 L 17 7 z M 7 17 L 15 17 L 15 25 L 7 25 L 7 17 z M 17 17 L 25 17 L 25 25 L 17 25 L 17 17 z"/></svg>
                <span>Users</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu" style="display:block;">

                <li class="nav-item {{Request::is('user') ? 'current active':'';}}">
                    <a href="{{route('user.user')}}">
                        Users List
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('view-roles')
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 5 5 L 5 27 L 27 27 L 27 5 L 5 5 z M 7 7 L 15 7 L 15 15 L 7 15 L 7 7 z M 17 7 L 25 7 L 25 15 L 17 15 L 17 7 z M 7 17 L 15 17 L 15 25 L 7 25 L 7 17 z M 17 17 L 25 17 L 25 25 L 17 25 L 17 17 z"/></svg>
                <span>Permission</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu"  style="display:block;">
                <li class="nav-item {{Request::is('roles') ? 'current active':'';}}">
                    <a href="{{route('roles.index')}}">
                        Roles
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 10 4 L 10 15 L 22 15 L 22 4 L 10 4 z M 12 6 L 14 6 L 14 10 L 16 8 L 18 10 L 18 6 L 20 6 L 20 13 L 12 13 L 12 6 z M 3 17 L 3 28 L 15 28 L 15 17 L 3 17 z M 17 17 L 17 28 L 29 28 L 29 17 L 17 17 z M 5 19 L 7 19 L 7 23 L 9 21 L 11 23 L 11 19 L 13 19 L 13 26 L 5 26 L 5 19 z M 19 19 L 21 19 L 21 23 L 23 21 L 25 23 L 25 19 L 27 19 L 27 26 L 19 26 L 19 19 z"/></svg>
                <span>Messenger</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu"  style="display:block;">

                <li class="nav-item {{Request::is('user/chat') ? 'current active':'';}}">
                    <a href="{{route('user.chat')}}">
                        MailBox
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 5 5 L 5 27 L 27 27 L 27 5 L 5 5 z M 7 7 L 15 7 L 15 15 L 7 15 L 7 7 z M 17 7 L 25 7 L 25 15 L 17 15 L 17 7 z M 7 17 L 15 17 L 15 25 L 7 25 L 7 17 z M 17 17 L 25 17 L 25 25 L 17 25 L 17 17 z"/></svg>
                <span>Help</span>
                <i class="chevron">
                    <svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
                </i>
            </a>
            <ul class="sidebar-submenu"  style="display:block;">

                <li>
                    <a href="{{route('contact-form')}}">
                        Contact Admin
                    </a>
                </li>
                @can('view-received-message')
                <li class="nav-item {{Request::is('contact') ? 'current active':'';}}">
                    <a href="{{route('contact.contact')}}">
                        Received messages
                    </a>
                </li>
                @endcan
            </ul>
        </li>


    </ul>
</nav>