<x-app-layout>
    @section('title', 'Assigned Roles')

    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                    <div>
                        <h1 class="mb-0 h2 fw-bold">Assigned Roles</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('roles.assigned') }}">Assigned Roles</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Assigned Role</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="{{ route('roles.assign') }}" class="btn btn-primary">Assign Role</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-4 mb-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Daftar Assigned Roles</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-card">
                            <table id="dataTableAssignedRoles" class="table table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama Role</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
                $('#dataTableAssignedRoles').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('roles.assigned') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        }
                    },
                    columns: [{
                            data: '#',
                            orderable: false
                        },
                        {
                            data: 'user_name',
                            name: 'user_name'
                        },
                        {
                            data: 'role_name',
                            name: 'role_name'
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
    @endpush

</x-app-layout>
