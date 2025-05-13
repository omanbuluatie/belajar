<x-app-layout>
    @section('title', 'Manage Role')
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                    <div>
                        <h1 class="mb-0 h2 fw-bold">Manage Roles for {{ $user->name }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('roles.assigned') }}">Assigned Roles</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Role</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-3">
                        <!-- Tambahkan link untuk mengelola roles di sini jika perlu -->
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
                            <h4 class="mb-0">Roles for {{ $user->name }}</h4>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="table-card">
                            <table id="dataTableRoles" class="table table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr id="role-{{ $role->id }}">
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <button class="btn btn-outline-danger btn-sm remove-role"
                                                    data-role-id="{{ $role->id }}"
                                                    data-user-id="{{ $user->id }}">
                                                    Remove Role
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
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
            $(document).on('click', '.remove-role', function() {
                var userId = $(this).data('user-id');
                var roleId = $(this).data('role-id');
                var row = $(this).closest('tr'); // Get the row to remove

                // SweetAlert untuk konfirmasi hapus role
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to remove this role from the user.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, remove it!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirimkan request AJAX untuk menghapus role
                        $.ajax({
                            url: "{{ url('roles/remove') }}/" + userId + '/' + roleId,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Removed!',
                                        'The role has been removed.',
                                        'success'
                                    )
                                    row.remove(); // Menghapus baris setelah berhasil
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'There was a problem removing the role.',
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Error!',
                                    'There was a problem with the request.',
                                    'error'
                                )
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
