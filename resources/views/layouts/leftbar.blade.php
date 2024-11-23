@php
    $isAdmin = auth()->check() && auth()->user()->is_admin == 1;
    $isAdminMaqshaf = auth()->check() && auth()->user()->is_admin == 2;
@endphp

<div class="left-side-menu" style="z-index: 0">
    <div class="h-100" data-simplebar>
        @auth('web')
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

                @if ($isAdminMaqshaf)
                    <p class="text-muted left-user-info">Admin Maqshaf</p>
                @elseif ($isAdmin)
                    <p class="text-muted left-user-info">Admin</p>
                @else
                    <p class="text-muted left-user-info">User</p>
                @endif

                {{-- <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li> --}}
                </ul>
            </div>
        @endauth

        @auth('portal_santri')
            <!-- User box -->
            <div class="user-box text-center">
                <img src="{{ url('assets/images/logos/logo-user-login.svg') }}" alt="user-img" title="Mat Helme"
                    class="rounded-circle img-thumbnail avatar-md">
                <div class="dropdown">
                    <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ auth('portal_santri')->user()->name }}</a>
                    @if (auth('portal_santri')->user()->user_role() === 'user')
                        <p>{{ auth('portal_santri')->user()->kelas()->nama_kelas }}</p>
                    @endif
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


                <p class="text-muted left-user-info">{{ auth('portal_santri')->user()->user_role()->name }}</p>


                {{-- <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li> --}}
                </ul>
            </div>
        @endauth

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


                {{-- kurang bagian if walisantri --}}

                @if ($isAdmin || $isAdminMaqshaf)
                    <li>
                        <a href="{{ route('orders') }}">
                            <i class="mdi mdi-view-list"></i>
                            <span> Daftar Pesanan </span>

                        </a>
                    </li>
                @endif

                @if ($isAdminMaqshaf)
                    <li class="menu-title">Administrator Menu</li>
                    <li @if (url()->current() == route('add.product')) class="menuitem-active" @endif>
                        <a href='{{ route('master.product') }}'>
                            <i class="mdi mdi-dropbox"></i>
                            <span> Master Barang </span>
                        </a>
                    </li>
                    <li @if (url()->current() == route('add.category')) class="menuitem-active" @endif>
                        <a href='{{ route('categories') }}'>
                            <i class="mdi mdi-book-cog-outline"></i>
                            <span> Master Kategori </span>
                        </a>
                    </li>
                @endif

                @if ($isAdmin)
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
                @elseif (auth('portal_santri')->check() && auth('portal_santri')->user()->is_admin == 0)
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
