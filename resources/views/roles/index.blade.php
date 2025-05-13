<x-app-layout>
    @section('title', 'Kelola Roles')
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                    <div>
                        <h1 class="mb-0 h2 fw-bold">Kelola Roles</h1>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary">Tambah Role</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-4 mb-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div
                        class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">Daftar Roles</h4>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="table-card">
                            <table id="dataTableRoles" class="table table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Role</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @push('scripts')
        <script>
            $(document).ready(function() {
                // Inisialisasi DataTable untuk Roles
                $('#dataTableRoles').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('roles.list') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        }
                    },
                    columns: [{
                            "data": "#",
                            orderable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });

                // Handle delete role action
                $(document).on('click', '.delete-role', function() {
                    let roleId = $(this).data('id');
                    let deleteUrl = `/roles/${roleId}`;
                    let token = $('meta[name="csrf-token"]').attr('content');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Role ini akan dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: deleteUrl,
                                type: 'DELETE',
                                data: {
                                    _token: token
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Berhasil!',
                                        'Role berhasil dihapus.',
                                        'success'
                                    );
                                    $('#dataTableRoles').DataTable().ajax.reload();
                                },
                                error: function(xhr) {
                                    Swal.fire(
                                        'Gagal!',
                                        'Terjadi kesalahan, role gagal dihapus.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
