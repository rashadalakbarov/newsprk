@extends('layouts.admin')

@section('title', 'Admin Permissions')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">All Admin Permissions</h4>
                    <!-- Grids in modals -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create Permission
                    </button>

                </div>

                <div class="card-body">
                    <table class="table table-nowrap">
                        @if ($permissions->count() > 0)
                            <thead>
                                <tr>
                                    <th scope="col">Permission Name</th>
                                    <th scope="col">Shortcut</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->label }}</td>
                                        <td>{{ $permission->key }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        <td>{{ $permission->updated_at }}</td>
                                        <td>
                                            <a href="" class="text-primary fs-4 me-2 editPermissionBtn"
                                                title="edit" data-bs-toggle="modal" data-bs-target="#updateModal"
                                                data-id="{{ $permission->id }}" data-name="{{ $permission->label }}"><i
                                                    class="mdi mdi-lead-pencil"></i></a>
                                            <a href="" class="text-danger fs-4 deletePermissionBtn" title="trash"
                                                data-id="{{ $permission->id }}"><i class="mdi mdi-trash-can"></i></a>
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
                    <h5 class="modal-title" id="createModalLabel">Add Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createdPermissionForm" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div>
                                    <label for="permission_name" class="form-label">Permission Name</label>
                                    <input type="text"
                                        class="form-control @error('permission_name') is-invalid @enderror"
                                        id="permission_name" placeholder="Enter Permission Name" name="permission_name"
                                        value="{{ old('permission_name') }}">
                                    @error('permission_name')
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
                    <h5 class="modal-title" id="updateModalLabel">Update Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updatedPermissionForm" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <div>
                                    <label for="edit_permission_name" class="form-label">Permission Name</label>
                                    <input type="text"
                                        class="form-control @error('edit_permission_name') is-invalid @enderror"
                                        id="edit_permission_name" placeholder="Enter Permission Name"
                                        name="edit_permission_name" value="{{ old('edit_permission_name') }}">
                                    @error('edit_permission_name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" id="edit_permission_id" name="edit_permission_id">

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
            $('#createdPermissionForm').on('submit', function(e) {
                e.preventDefault();

                $('#permission_name').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.users.permissions.store') }}",
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

                            if (errors.permission_name) {
                                $('#permission_name').addClass('is-invalid');

                                $('#permission_name').after(
                                    '<div class="invalid-feedback">' +
                                    errors.permission_name[0] +
                                    '</div>'
                                );
                            }
                        }
                    }
                });
            });

            $('.editPermissionBtn').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');

                $('#edit_permission_name').val(name);
                $('#edit_permission_id').val(id);
            });

            $('#updatedPermissionForm').on('submit', function(e) {
                e.preventDefault();

                let permissionId = $('#edit_permission_id').val();
                let formData = $(this).serialize();

                $('#edit_permission_name').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                $.ajax({
                    type: "POST",
                    url: "/admin/users/permissions/update/" + permissionId,
                    data: formData,
                    success: function(response) {
                        $('#updateModal').modal('hide');
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Your permission has been updated",
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

                            if (errors.edit_permission_name) {
                                $('#edit_permission_name').addClass('is-invalid');

                                $('#edit_permission_name').after(
                                    '<div class="invalid-feedback">' +
                                    errors.edit_permission_name[0] +
                                    '</div>'
                                );
                            }
                        }
                    }
                });
            });

            $('.deletePermissionBtn').on('click', function(e) {
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
                            url: "/admin/users/permissions/delete/" + roleId,
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your permission has been deleted.",
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
