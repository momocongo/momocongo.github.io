@php
    // $id = Auth::user()->id;
    // $adminData = App\Models\User::find($id);
@endphp

<header id="page-topbar" class="bg-blue-momo">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logomomo.jpg') }}" alt="logo-sm" width="120" height="44">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logomomo.jpg') }}" alt="logo-dark" width="40" height="44">
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logomomo.jpg') }}" alt="logo-sm-light" height="44">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logomomo.jpg') }}" alt="logo-light" height="44">
                    </span>
                </a>
            </div>

            <button type="button" class="px-3 btn btn-sm font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="align-middle ri-menu-2-line"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" name="search" id="search" class="form-control"
                        value="{{--}}{{ request('search') }}--}} Aucune" placeholder="Recherche...">
                    <span class="ri-search-line"></span>
                </div>
            </form>

        </div>

        <div class="d-flex">


            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="ri-apps-2-line"></i>
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user"
                        src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                        alt="Header Avatar"> --}}
                    <span class="d-none d-xl-inline-block ms-1">@if (auth()->check()) {{ auth()->user()->name }} @else Guest @endif</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    @if(auth()->check())
                    <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                            class="align-middle ri-user-line me-1"></i> Profile</a>

                    <div class="dropdown-divider"></div>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                    @else
                        <a class="dropdown-item" href="{{ route('register') }}"><i
                                class="align-middle ri-users me-1"></i> S'enregistrer</a>
                    <div>  <a class="dropdown-item" href="{{ route('login') }}"><i
                                class="align-middle ri-users me-1"></i> Se connecter</a></div>

                     @endif
{{--                    <a class="dropdown-item text-danger" href="#"><i--}}
{{--                            class="align-middle ri-shut-down-line me-1 text-danger"></i> Logout</a>--}}

            </div>


        </div>
    </div>
</header>
