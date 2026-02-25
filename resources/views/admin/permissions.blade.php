@extends('layouts.admin')

@section('title', 'Admin Roles')

@section('css')
    <link rel="stylesheet" href="{{ asset('/admin/') }}/assets/libs/gridjs/theme/mermaid.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Permissions</h4>
                </div>

                <div class="card-body">
                    <div id="table-search"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/admin/') }}/assets/libs/gridjs/gridjs.umd.js"></script>
    <script src="{{ asset('/admin/') }}/assets/js/pages/gridjs.init.js"></script>
@endsection
