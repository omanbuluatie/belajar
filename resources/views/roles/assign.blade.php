<x-app-layout>
    @section('title', 'Assign Role')

    <section class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex flex-column">
                        <h1 class="mb-0 h2 fw-bold">Assign Role</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('roles.index') }}">Roles</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Assign Role</li>
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
                            <form method="POST" action="{{ route('roles.storeAssign') }}" id="assignRoleForm"
                                class="row gx-3 needs-validation" novalidate>
                                @csrf
                                
                                <!-- Select User -->
                                <div class="mb-3 col-12">
                                    <label class="form-label" for="user_id">
                                        Select User
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="user_id" id="user_id" class="form-control" required>
                                        <option value="" selected disabled>-- Select User --</option>
                                        @foreach ($users as $userId => $userName)
                                            <option value="{{ $userId }}">{{ $userName }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a user.</div>
                                </div>

                                <!-- Select Role (Multiple) -->
                                <div class="mb-3 col-12">
                                    <label class="form-label" for="role_id">
                                        Select Role
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="role_id[]" id="role_id" class="form-control" multiple required>
                                        <option value="" disabled>-- Select Roles --</option>
                                        @foreach ($roles as $roleId => $roleName)
                                            <option value="{{ $roleId }}">{{ $roleName }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select at least one role.</div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Assign Role</button>
                                    <a href="{{ route('roles.index') }}"
                                        class="btn btn-outline-primary ms-2">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
