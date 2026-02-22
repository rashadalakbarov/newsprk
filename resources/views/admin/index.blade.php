@extends('layouts.auth-admin')

@section('title', 'Sign In')

@section('css')
    <style>
        .form-control.is-invalid,
        .was-validated .form-control:invalid {
            background-image: none;
        }
    </style>
@endsection

@section('content')
    <div class="p-2 mt-4">
        @if (Session::has('error'))
            <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
        @endif

        <form action="{{ route('admin.index.post') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    placeholder="Enter username" name="username" value="{{ old('username') }}">
                @error('username')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password-input">Password</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror pe-5 password-input"
                        placeholder="Enter password" id="password-input" name="password" value="{{ old('password') }}">
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                    <button
                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon"
                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-success w-100" type="submit">Sign In</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <!-- particles js -->
    <script src="{{ asset('/admin/') }}/assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="{{ asset('/admin/') }}/assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="{{ asset('/admin/') }}/assets/js/pages/password-addon.init.js"></script>
@endsection
