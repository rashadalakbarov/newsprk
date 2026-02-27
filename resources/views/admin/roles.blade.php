@extends('layouts.admin')

@section('title', 'Admin Roles')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Roles</h4>
                    <!-- Grids in modals -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                        Create Role
                    </button>

                </div>

                <div class="card-body">
                    <table class="table table-nowrap">
                        @if ($roles->count() > 0)
                            <thead>
                                <tr>
                                    <th scope="col">Role Name</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $role->name }}</th>
                                        <td>{{ $role->created_at }}</td>
                                        <td>{{ $role->updated_at }}</td>
                                        <td><a href="javascript:void(0);" class="link-success">View More <i
                                                    class="ri-arrow-right-line align-middle"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <div class="alert alert-secondary border-0 shadow mb-xl-0" role="alert">
                                <strong> İnfo notification! </strong> There is no data in the role field.
                            </div>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Alerts -->
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createdRoleForm" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div>
                                    <label for="role_name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control @error('role_name') is-invalid @enderror"
                                        id="role_name" placeholder="Enter Role Name" name="role_name"
                                        value="{{ old('role_name') }}">
                                    @error('role_name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#createdRoleForm').on('submit', function(e) {
                e.preventDefault();

                $('#role_name').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.users.roles.store') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Your role has been saved",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(xhr) {

                        if (xhr.status === 422) {

                            let errors = xhr.responseJSON.errors;

                            if (errors.role_name) {
                                $('#role_name').addClass('is-invalid');

                                $('#role_name').after(
                                    '<div class="invalid-feedback">' +
                                    errors.role_name[0] +
                                    '</div>'
                                );
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
