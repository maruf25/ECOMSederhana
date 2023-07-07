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

    {{-- Carousel --}}
    @if (Route::is('ecom.index'))
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner vh-100">
                <div class="carousel-item active">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fd0%2Fb6%2F5c%2Fd0b65c5c53657f897af6862c44d8a5e2.jpg&f=1&nofb=1&ipt=02d19fedd21885f38f8599d7560460f8f0cedbf23c000e3e8c227ab2507832cb&ipo=images"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Faf%2F35%2Fef%2Faf35efa2608fe1b9fdd25613fa846b34.jpg&f=1&nofb=1&ipt=2c962e3a471795f9a7bf093a75957089315595f0681dfeecfe9228028f0b493e&ipo=images"
                        class="d-block w-100 object-cover" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F05%2F8c%2Fa5%2F058ca55eae5b86fa8a4d52c1d1e5a4a4.jpg&f=1&nofb=1&ipt=1ada97b339fb31a18a3b0836a915b1c282a54945f6082b1cbf757da647caef7f&ipo=images"
                        class="d-block w-100 vh-100 object-cover" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif

    {{-- Content --}}
    @yield('content')
</div>
