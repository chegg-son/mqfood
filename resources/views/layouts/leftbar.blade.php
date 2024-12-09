<div class="left-side-menu" style="z-index: 0">
    <div class="h-100" data-simplebar>
        @auth
            <!-- User box -->
            <div class="user-box text-center">
                <img src="{{ url('assets/images/logos/logo-user-login.svg') }}" alt="user-img" title="Mat Helme"
                    class="rounded-circle img-thumbnail avatar-md">
                <div class="dropdown">
                    <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ auth()->user()->name }}</a>
                    <div class="dropdown-menu user-pro-dropdown">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user me-1"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out me-1"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </div>

                <p class="text-muted left-user-info">{{ auth()->user()->user_role()->name }}</p>

                {{-- <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li> --}}
                </ul>
            </div>
        @endauth

        @if (session()->has('user'))
            <!-- User box -->
            <div class="user-box text-center">
                <img src="{{ url('assets/images/logos/logo-user-login.svg') }}" alt="user-img" title="Mat Helme"
                    class="rounded-circle img-thumbnail avatar-md">
                <div class="dropdown">
                    <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ session()->get('user')['name'] }}</a>
                </div>

                <p class="text-muted left-user-info">
                    {{ session()->get('role')[0]['name'] }}
                </p>

                {{-- <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li> --}}
                </ul>
            </div>
        @endif

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href={{ route('home') }}>
                        <i class="mdi mdi-home"></i>
                        <span> Beranda </span>
                    </a>
                </li>

                @if (auth()->check() && in_array(auth()->user()->user_role()->name, ['admin', 'superadmin']))
                    <li>
                        <a href="{{ route('orders') }}">
                            <i class="mdi mdi-home"></i>
                            <span> Daftar Pesanan </span>

                        </a>
                    </li>
                @endif
                @if (auth()->check() && in_array(auth()->user()->user_role()->name, ['admin', 'superadmin']))
                    <li class="menu-title">Administrator Menu</li>
                    <li @if (url()->current() == route('add.product')) class="menuitem-active" @endif>
                        <a href='{{ route('master.product') }}'>
                            <i class="mdi mdi-dropbox"></i>
                            <span> Master Barang </span>
                        </a>
                    </li>
                    <li @if (url()->current() == route('add.user')) class="menuitem-active" @endif>
                        <a href='{{ route('master.user') }}'>
                            <i class="mdi mdi-account-cog-outline"></i>
                            <span> Master User </span>
                        </a>
                    </li>
                    <li @if (url()->current() == route('add.category')) class="menuitem-active" @endif>
                        <a href='{{ route('categories') }}'>
                            <i class="mdi mdi-book-cog-outline"></i>
                            <span> Master Kategori </span>
                        </a>
                    </li>
                @elseif (auth()->check() && !in_array(auth()->user()->user_role()->name, ['admin', 'superadmin']))
                    <li>
                        <a href={{ route('checkout') }}>
                            <i class="mdi mdi-cart-variant"></i>
                            @livewire('cart-counter')
                            <span> Keranjang </span>
                        </a>
                    </li>
                    <li>
                        <a href='{{ route('orders') }}'>
                            <i class="mdi mdi-view-list-outline"></i>
                            <span> Pesanan </span>
                        </a>
                    </li>
                @endif


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
