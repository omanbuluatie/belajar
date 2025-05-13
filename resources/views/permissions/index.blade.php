<x-app-layout>
    @section('title', 'Kelola Permissions')
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                    <div>
                        <h1 class="mb-0 h2 fw-bold">Kelola Permissions</h1>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary">Tambah Permission</a>
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
                            <h4 class="mb-0">Daftar Permissions</h4>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="table-card">
                            <table id="dataTablePermissions" class="table table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Permission</th>
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
                // Inisialisasi DataTable untuk Permissions
                $('#dataTablePermissions').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('permissions.list') }}",
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

                // Handle delete permission action
                $(document).on('click', '.delete-permission', function() {
                    let permissionId = $(this).data('id');
                    let deleteUrl = `/permissions/${permissionId}`;
                    let token = $('meta[name="csrf-token"]').attr('content');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Permission ini akan dihapus!",
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
                                        'Permission berhasil dihapus.',
                                        'success'
                                    );
                                    $('#dataTablePermissions').DataTable().ajax.reload();
                                },
                                error: function(xhr) {
                                    Swal.fire(
                                        'Gagal!',
                                        'Terjadi kesalahan, permission gagal dihapus.',
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
