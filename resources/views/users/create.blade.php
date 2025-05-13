<x-app-layout>
    @section('title', 'Create Pengguna')
    
    <section class="container-fluid p-4">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 align-items-lg-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Create New Users</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('users.index')}}">Users</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Create Users</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="py-6">
            <!-- row -->
            <div class="row">
                <div class="offset-xl-3 col-xl-6 col-md-12 col-12">
                    <!-- card -->
                    <div class="card">
                        <!-- card body -->
                        <div class="card-body p-lg-6">
                            <!-- form -->
                            <form method="POST" action="{{ route('users.store') }}" id="createUserForm"
                                class="row gx-3 needs-validation" novalidate>
                                @csrf
                                <div class="mb-3 col-12">
                                    <label class="form-label" for="name">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    {{ html()->text('name')->class('form-control')->placeholder('Masukkan nama lengkap pengguna')->required()->attribute('autofocus') }}
                                    <div class="invalid-feedback">Please enter the name.</div>
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label" for="email">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    {{ html()->email('email')->class('form-control')->placeholder('Masukkan email pengguna')->required() }}
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label" for="password">
                                        Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    {{ html()->password('password')->class('form-control')->placeholder('Masukkan password pengguna')->required() }}
                                    <div class="invalid-feedback">Please enter a password.</div>
                                </div>

                                

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Tambah Pengguna</button>
                                    <button type="button" class="btn btn-outline-primary ms-2"
                                        data-bs-dismiss="offcanvas" aria-label="Close">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#createUserForm').submit(function(event) {
                    event.preventDefault(); // Mencegah form submit biasa

                    // Menampilkan konfirmasi SweetAlert sebelum mengirim data
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data pengguna akan disimpan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Simpan!',
                        cancelButtonText: 'Tidak, Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mengambil data dari form
                            var formData = {
                                name: $('#name').val(),
                                email: $('#email').val(),
                                password: $('#password').val(),
                                password_confirmation: $('#password_confirmation').val(),
                                _token: "{{ csrf_token() }}" // Menambahkan CSRF token
                            };

                            // Mengirim data menggunakan AJAX POST
                            $.ajax({
                                url: '{{ route('users.store') }}',
                                type: 'POST',
                                data: formData,
                                success: function(response) {
                                    // Menampilkan SweetAlert sukses
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Pengguna Berhasil Ditambahkan!',
                                        text: response.message,
                                        confirmButtonText: 'OK'
                                    });

                                    // Mengosongkan form setelah sukses
                                    $('#createUserForm')[0].reset();
                                },
                                error: function(xhr) {
                                    // Menampilkan pesan error jika ada
                                    var errors = xhr.responseJSON.errors;
                                    var errorMessages = '';
                                    $.each(errors, function(key, value) {
                                        errorMessages += '<p>' + value[0] + '</p>';
                                    });

                                    // Menampilkan SweetAlert error
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Terjadi Kesalahan!',
                                        html: errorMessages,
                                        confirmButtonText: 'OK'
                                    });
                                }
                            });
                        } else {
                            // Menangani pembatalan pengiriman
                            Swal.fire({
                                icon: 'info',
                                title: 'Batal Menyimpan!',
                                text: 'Data pengguna tidak disimpan.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                });
            });
        </script>
    @endpush



    <!-- jQuery and AJAX Script -->



</x-app-layout>
