<x-app-layout>
    @section('title', 'Create Role')

    <section class="container-fluid p-4">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 align-items-lg-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Create New Role</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('roles.index') }}">Roles</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Create Role</li>
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
                            <form method="POST" action="{{ route('roles.store') }}" id="createRoleForm"
                                class="row gx-3 needs-validation" novalidate>
                                @csrf
                                <div class="mb-3 col-12">
                                    <label class="form-label" for="name">
                                        Role Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter role name" required autofocus>
                                    <div class="invalid-feedback">Please enter the role name.</div>
                                </div>



                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Tambah Role</button>
                                    <a href="{{ route('roles.index') }}"
                                        class="btn btn-outline-primary ms-2">Kembali</a>
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
                $('#createRoleForm').submit(function(event) {
                    event.preventDefault(); // Prevent default form submission

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data role akan disimpan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Simpan!',
                        cancelButtonText: 'Tidak, Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var formData = $(this).serialize();

                            $.ajax({
                                url: '{{ route('roles.store') }}',
                                type: 'POST',
                                data: formData,
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Role Berhasil Ditambahkan!',
                                        text: response.message,
                                        confirmButtonText: 'OK'
                                    });

                                    $('#createRoleForm')[0].reset();
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
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Batal Menyimpan!',
                                text: 'Data role tidak disimpan.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
