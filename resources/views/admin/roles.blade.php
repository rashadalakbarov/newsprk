@extends('layouts.admin')

@section('title', 'Admin Roles')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">All Admin Roles</h4>
                    <!-- Grids in modals -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
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
                                        <td>
                                            <a href="" class="text-primary fs-4 me-2 editRoleBtn" title="edit"
                                                data-bs-toggle="modal" data-bs-target="#updateModal"
                                                data-id="{{ $role->id }}" data-name="{{ $role->name }}"><i
                                                    class="mdi mdi-lead-pencil"></i></a>
                                            <a href="" class="text-danger fs-4 deleteRoleBtn" title="trash"
                                                data-id="{{ $role->id }}"><i class="mdi mdi-trash-can"></i></a>
                                        </td>
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

    <!-- Create Modal Alerts -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add Role</h5>
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

    <!-- Update Modal Alerts -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updatedRoleForm" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div>
                                    <label for="edit_role_name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control @error('edit_role_name') is-invalid @enderror"
                                        id="edit_role_name" placeholder="Enter Role Name" name="edit_role_name"
                                        value="{{ old('edit_role_name') }}">
                                    @error('edit_role_name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" id="edit_role_id" name="edit_role_id">

                            <div class="col-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
                        $('#createModal').modal('hide');
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

            $('.editRoleBtn').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');

                $('#edit_role_name').val(name);
                $('#edit_role_id').val(id);
            });

            $('#updatedRoleForm').on('submit', function(e) {
                e.preventDefault();

                let roleId = $('#edit_role_id').val();
                let formData = $(this).serialize();

                $('#edit_role_name').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                $.ajax({
                    type: "POST",
                    url: "/admin/users/roles/update/" + roleId,
                    data: formData,
                    success: function(response) {
                        $('#updateModal').modal('hide');
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Your role has been updated",
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

                            if (errors.edit_role_name) {
                                $('#edit_role_name').addClass('is-invalid');

                                $('#edit_role_name').after(
                                    '<div class="invalid-feedback">' +
                                    errors.edit_role_name[0] +
                                    '</div>'
                                );
                            }
                        }
                    }
                });
            });

            $('.deleteRoleBtn').on('click', function(e) {
                e.preventDefault();

                let roleId = $(this).data('id');
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "/admin/users/roles/delete/" + roleId,
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your role has been deleted.",
                                    icon: "success",
                                    timer: 1500,
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        })
                    }
                });
            });
        });
    </script>
@endsection
