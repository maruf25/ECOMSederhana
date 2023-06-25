    @push('css')
        <style>
            body {
                height: 100%;
                overflow-y: hidden;
            }

            .bg-image-vertical {
                position: relative;
                overflow: hidden;
                background-repeat: no-repeat;
                background-position: right center;
                background-size: auto 100%;
            }

            @media (min-width: 1025px) {
                .h-custom-2 {
                    height: 100%;
                }
            }
        </style>
    @endpush
    {{-- template --}}
    <section class="vh-100">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-6 text-black">
                    <div class="px-5 ms-xl-4">
                        <img src="{{ asset('logo.png') }}" alt="" class="me-3 pt-5 mt-xl-4"
                            style="width: 100px">
                    </div>
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-0 pt-5 pt-xl-0 mt-xl-n5">
                        <form style="width: 23rem;" wire:submit.prevent='loginUser'>
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
                            <div class="form-outline mb-4">
                                <input type="email" id="form2Example18"
                                    class="form-control form-control-lg @error('email')
                        is-invalid
                        @enderror"
                                    wire:model.defer='email' />
                                <label class="form-label" for="form2Example18">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example28" class="form-control form-control-lg"
                                    wire:model.defer='password' />
                                <label class="form-label" for="form2Example28">Password</label>
                            </div>
                            <div class="pt-1 mb-2">
                                <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                            </div>
                            <p>Don't have an account? <a href="/register" class="link-info">Register here</a></p>

                        </form>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://images.unsplash.com/photo-1573152143286-0c422b4d2175?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                        alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>
