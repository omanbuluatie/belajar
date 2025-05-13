<x-app-layout>
    @section('title', 'Kelola Pengguna')
    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div
                    class="border-bottom pb-3 mb-3 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                    <div>
                        <h1 class="mb-0 h2 fw-bold">Kelola Pengguna</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('users.index') }}">Users</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Daftar Pengguna</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-3">

                        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna</a>
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
                            <h4 class="mb-0">Laporan</h4>
                        </div>
                        <div>
                            <div class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                    id="courseDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="courseDropdown1">
                                    <span class="dropdown-header">Settings</span>
                                    <a class="dropdown-item" href="{{ route('report.exportPdf') }}">
                                        <i class="fe fe-external-link dropdown-item-icon"></i>
                                        Export PDF
                                    </a>
                                    {{-- <a class="dropdown-item" href="#">
                                        <i class="fe fe-mail dropdown-item-icon"></i>
                                        Email Report
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-download dropdown-item-icon"></i>
                                        Download XLS
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="mb-4" id="userFilterAccordion">
                            {{ html()->form('PUST', url('users/filter'))->id('form_user_filter')->open() }}

                            <div class="list-group list-group-flush">
                                <div class="list-group-item px-0">
                                    <a class="d-flex align-items-center text-inherit h4 mb-0" data-bs-toggle="collapse"
                                        href="#filterOptions" role="button" aria-expanded="true"
                                        aria-controls="filterOptions">
                                        <div class="me-auto">Filter Options</div>
                                        <span class="chevron-arrow ms-4">
                                            <i class="fe fe-chevron-down fs-4"></i>
                                        </span>
                                    </a>

                                    <div class="collapse show" id="filterOptions" data-bs-parent="#userFilterAccordion">
                                        <div class="py-3">
                                            <div class="row gx-3">
                                                <div class="mt-3 mb-3 col-md-2">
                                                    {{ html()->label('Name:', 'name')->class('form-label') }}
                                                </div>
                                                <div class="mt-3 mb-3 col-md-4">
                                                    {{ html()->text('name', request('name'))->class('form-control')->placeholder('Enter name') }}
                                                </div>

                                                <div class="mt-3 mb-3 col-md-2">
                                                    {{ html()->label('Email:', 'email')->class('form-label') }}
                                                </div>
                                                <div class="mt-3 mb-3 col-md-4">
                                                    {{ html()->text('email', request('email'))->class('form-control')->placeholder('Enter email') }}
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                {{ html()->button('Filter')->id('filterButton')->class('btn btn-primary')->type('submit') }}
                            </div>

                            {{ html()->form()->close() }}
                        </div>
                        <hr>
                        <div class="table-card">
                            <table id="dataTableBasic" class="table table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Status</th>
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
                // Inisialisasi DataTable
                fillDataTable();
                $('#filterButton').on('click', function() {
                    fillDataTable(); // Tambahkan pemanggilan fillDataTable() di sini
                });



                // Trigger filter
                $('#form_user_filter').on('submit', function(e) {
                    e.preventDefault();
                    $('#dataTableBasic').DataTable().ajax.reload();
                });

                $(document).on('click', '.delete-user', function() {
                    let userId = $(this).data('id'); // Dapatkan ID pengguna
                    let deleteUrl = `/users/${userId}`; // URL untuk API delete
                    let token = $('meta[name="csrf-token"]').attr('content'); // Token CSRF

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data pengguna akan dinonaktifkan!",
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
                                        'Pengguna berhasil dinonaktifkan.',
                                        'success'
                                    );

                                    // Hapus baris tabel
                                    let row = $(`[data-id="${userId}"]`).closest('tr');
                                    if (row.length) {
                                        row.remove();
                                    } else {
                                        console.warn('Baris tidak ditemukan.');
                                    }
                                },
                                error: function(xhr) {
                                    Swal.fire(
                                        'Gagal!',
                                        'Terjadi kesalahan, pengguna gagal dinonaktifkan.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                });
            });

            function fillDataTable() {
                $('#dataTableBasic').DataTable().destroy();
                let name = $('#name').val();
                let email = $('#email').val();
                $('#dataTableBasic').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('users.list') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            name: $('#name').val(),
                            email: $('#email').val(),
                            role: $('#role').val(),
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
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'is_active',
                            name: 'is_active'
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            }
        </script>
    @endpush
</x-app-layout>
