<div class="bg-secondary bg-opacity-25 my-0 py-0">
    <div class="border-bottom order-1 bg-white">
        <div class="container">
            <div class="row">
                <div class="col py-3">
                    <div class="head-nav-item float-start">
                        <a href="{{ route('ecom.index') }}"><img src="{{ asset('logo.png') }}" style="height: 50px;"
                                class="me-5"></a>
                    </div>
                </div>
                <div class="col my-auto">
                    <div class="ship-dollar text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" fill="currentColor"
                            class="bi bi-truck" viewBox="0 0 16 16">
                            <path
                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                        ------
                        <svg xmlns="http://www.w3.org/2000/svg" width="15%" height="15%" fill="currentColor"
                            class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path
                                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                        </svg>
                    </div>
                </div>
                <div class="col my-auto">
                    <h2 class="fw-bold float-end">TRANSAKSI AMAN</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Head -->
    <div class="container">
        <form action="" class="py-3" wire:submit.prevent='pay'>
            <h3>Alamat</h3>
            <hr>
            <p>Nama <span class="text-danger">*</span></p>
            <input type="text" name="nama" style="width: 100%;" required value="{{ Auth::user()->name }}"
                wire:model.defer='name'>
            <p>Alamat <span class="text-danger">*</span></p>
            <input type="text" name="alamat" style="width: 100%;" wire:model.defer='alamat' required>
            <p>Negara <span class="text-danger">*</span></p>
            <input type="text" value="Indonesia" readonly name="negara" style="width: 100%;" required
                wire:model.defer='negara'>
            <p>Provinsi <span class="text-danger">*</span></p>
            <input type="text" name="provinsi" style="width: 100%;" wire:model.defer='provinsi' required>
            <p>Kabupaten <span class="text-danger">*</span></p>
            <input type="text" name="kabupaten" style="width: 100%;" wire:model.defer='kabupaten' required>
            <p>Kecamatan <span class="text-danger">*</span></p>
            <input type="text" name="kecamatan" style="width: 100%;" wire:model.defer='kecamatan' required>
            <hr>
            <h3 class="fw-bold text-danger text-center">SEGALA KESALAHAN PENULISAN ALAMAT BUKAN TANGGUNG JAWAB TOKO,
                MOHON DICEK KEMBALI!!!</h3>
            <center>
                <input type="submit" name="bayar" value="BAYAR" class="bg-danger text-white border-0 p-3 fw-bold"
                    style="text-align: center; width: 300px;">
            </center>
        </form>
    </div>
