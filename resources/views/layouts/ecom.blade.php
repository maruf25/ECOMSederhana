<div>
    {{-- Navbar --}}
    <div class="border-bottom sticky-top order-1 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-5 py-3">
                    <div class="head-nav-item">
                        <a href="{{ route('ecom.index') }}"><img src="{{ asset('logo.png') }}" style="height: 50px;"
                                class="me-5"></a>
                        {{-- <a href="pria.php" class="text-decoration-none fw-bolder text-black-50 me-3">Pria</a>
                        <a href="wanita.php" class="text-decoration-none fw-bolder text-black-50 mx-3">Wanita</a>
                        <a href="anak.php" class="text-decoration-none fw-bolder text-black-50 mx-3">Anak</a> --}}
                    </div>
                </div>
                <div class="col-4 my-auto">
                    <livewire:search :pilihan="'ecom'">
                </div>
                <div class="col-3 my-auto">
                    <a class="text-decoration-none text-black-50 mx-3 fw-bold dropdown-toggle" href="#"
                        role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        style="font-size: 13px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z">
                            </path>
                        </svg> {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @role('admin')
                            <a href='{{ route('dashboard.index') }}' class="dropdown-item">
                                <i class="fas fa-fw fa-tachometer-alt"></i> Dahsboard</a>
                        @endrole
                        <livewire:logout>
                    </div>
                    <a href="{{ route('ecom.chart') }}" class="text-decoration-none text-black-50 mx-3 fw-bold"
                        style="font-size: 13px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bag-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z">
                            </path>
                        </svg> Chart</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Content --}}
    @yield('content')
</div>
