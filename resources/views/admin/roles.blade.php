@extends('layouts.admin')

@section('title', 'Admin Roles')

@section('css')
    <link rel="stylesheet" href="{{ asset('/admin/') }}/assets/libs/gridjs/theme/mermaid.min.css">
@endsection

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
                    <div id="table-roles"></div>
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
                    <form action="javascript:void(0);">
                        <div class="row g-3">
                            <div class="col-12">
                                <div>
                                    <label for="role_name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control" id="role_name" placeholder="Enter Role Name">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/admin/') }}/assets/libs/gridjs/gridjs.umd.js"></script>
    <script src="{{ asset('/admin/') }}/assets/js/pages/gridjs.init.js"></script>

    <script>
        document.getElementById("table-roles") &&
            new gridjs.Grid({
                columns: [{
                        name: "Name",
                        width: "150px"
                    },
                    {
                        name: "Created",
                        width: "250px"
                    },
                    {
                        name: "Updated",
                        width: "250px"
                    },
                    {
                        name: "Action",
                        width: "150px"
                    },
                ],
                pagination: {
                    limit: 5
                },
                search: !0,
                data: [
                    [
                        "Jonathan",
                        "jonathan@example.com",
                        "Senior Implementation Architect",
                        "Holy See",
                    ],
                ],
            }).render(document.getElementById("table-roles"))
    </script>
@endsection
