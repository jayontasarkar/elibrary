<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset(user()->avatar_url()) }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ user()->name }}
            </div>
            <div class="email">
                {{ user()->email ? : '+88' . user()->phone }}
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ url('profile') }}"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="{{ url('logout') }}">
                        <i class="material-icons">input</i>Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header active">SITE NAVIGATION MENU</li>
            <li class="{{ Request::segment(1) == 'dashboard' ? 'active' : ''}}">
                <a href="{{ url('dashboard') }}" class="toggled waves-effect waves-block">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->type == 'librarian')
            <li class="{{ Request::segment(1) == 'users' ? 'active' : ''}}">
                <a href="{{ url('users') }}">
                    <i class="material-icons">group</i>
                    <span>User Management</span>
                </a>
            </li>
            @endif
            <li class="{{ Request::segment(1) == 'members' ? 'active' : ''}}">
                <a href="{{ url('members') }}">
                    <i class="material-icons">perm_contact_calendar</i>
                    <span>Member Management</span>
                </a>
            </li>
            <li class="{{ in_array(Request::segment(1), ['categories', 'authors', 'borrow-books', 'books', 'return-books']) ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">library_add</i>
                    <span>Library Management</span>
                </a>
                @if(auth()->user()->type == 'librarian')
                <ul class="ml-menu">
                    <li class="{{ Request::segment(1) == 'categories' ? 'active' : ''}}">
                        <a href="{{ url('categories') }}">
                            <i class="material-icons">library_music</i>
                            <span>Category Management</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(1) == 'authors' ? 'active' : ''}}">
                        <a href="{{ url('authors') }}">
                            <i class="material-icons">account_box</i>
                            <span>Author Management</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(1) == 'books' ? 'active' : ''}}">
                        <a href="{{ url('books') }}">
                            <i class="material-icons">book</i>
                            <span>Books Management</span>
                        </a>
                    </li>
                    @endif
                    <li class="{{ Request::segment(1) == 'borrow-books' ? 'active' : ''}}">
                        <a href="{{ url('borrow-books') }}">
                            <i class="material-icons">library_books</i>
                            <span>Borrow Library Books</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(1) == 'return-books' ? 'active' : ''}}">
                        <a href="{{ url('return-books') }}">
                            <i class="material-icons">branding_watermark</i>
                            <span>Return Library Books</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if(config('library.settings.penalty_option') == 1)
            <li class="{{ in_array(Request::segment(1), ['penalty']) ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">money_off</i>
                    <span>Accounts Management</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ Request::is('penalty/create') ? 'active' : ''}}">
                        <a href="{{ url('penalty/create') }}">
                            <i class="material-icons">monetization_on</i>
                            <span>Penalty Payment</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="{{ in_array(Request::segment(1), ['unavailable-books']) ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">call_to_action</i>
                    <span>Library Reports</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ Request::segment(1) == 'unavailable-books' ? 'active' : ''}}">
                        <a href="{{ url('unavailable-books') }}">
                            <i class="material-icons">report</i>
                            <span>Unavailable Books</span>
                        </a>
                    </li>
                </ul>    
            </li>
            @if(auth()->user()->type == 'librarian')
            <li class="{{ Request::segment(1) == 'history' ? 'active' : ''}}">
                <a href="{{ url('history') }}">
                    <i class="material-icons">history</i>
                    <span>Borrow History</span>
                </a>
            </li>
            <li class="{{ Request::segment(1) == 'gallery' ? 'active' : ''}}">
                <a href="{{ url('gallery') }}">
                    <i class="material-icons">photo_library</i>
                    <span>Image Gallery</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>