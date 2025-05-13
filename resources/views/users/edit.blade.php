<x-app-layout>
    @section('title', 'Edit Pengguna')

    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 align-items-lg-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Edit Users</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin-dashboard.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('users.index') }}">Users</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Users</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-6">
            <div class="row">
                <div class="offset-xl-3 col-xl-6 col-md-12 col-12">
                    <div class="card">
                        <div class="card-body p-lg-6">
                            <form method="POST" action="{{ route('users.update', $user->id) }}" id="editUserForm"
                                class="row gx-3 needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="mb-3 col-12">
                                    <label class="form-label" for="name">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    {{ html()->text('name', $user->name)->class('form-control')->placeholder('Masukkan nama lengkap pengguna')->required()->attribute('autofocus') }}
                                    <div class="invalid-feedback">Please enter the name.</div>
                                </div>

                                <div class="mb-3 col-12">
                                    <label class="form-label" for="email">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    {{ html()->email('email', $user->email)->class('form-control')->placeholder('Masukkan email pengguna')->required() }}
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>

                                
                                <div class="mb-3 col-12">
                                    <label class="form-label" for="is_active">
                                        Status User
                                        <span class="text-danger">*</span>
                                    </label>
                                    {{ html()->select(
                                            'is_active',
                                            [
                                                1 => 'Aktif',
                                                0 => 'Non Aktif',
                                            ],
                                            $user->is_active,
                                        )->class('form-select')->required() }}
                                    <div class="invalid-feedback">Please select a status.</div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update Pengguna</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-outline-primary ms-2">Batal</a>
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
                $('#editUserForm').submit(function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Perubahan akan disimpan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Simpan!',
                        cancelButtonText: 'Tidak, Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var formData = {
                                name: $('#name').val(),
                                email: $('#email').val(),
                                is_active: $('#is_active').val(),
                                _method: 'PUT',
                                _token: "{{ csrf_token() }}"
                            };

                            $.ajax({
                                url: '{{ route('users.update', $user->id) }}',
                                type: 'POST',
                                data: formData,
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Pengguna Berhasil Diperbarui!',
                                        text: response.message,
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        window.location.href =
                                            "{{ route('users.index') }}";
                                    });
                                },
                                error: function(xhr) {
                                    var errors = xhr.responseJSON.errors;
                                    var errorMessages = '';
                                    $.each(errors, function(key, value) {
                                        errorMessages += '<p>' + value[0] + '</p>';
                                    });

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Terjadi Kesalahan!',
                                        html: errorMessages,
                                        confirmButtonText: 'OK'
                                    });
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
