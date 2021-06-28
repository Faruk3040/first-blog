@extends('welcome')
@section('content')

    <body class="bg-gradient-primary">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 pt-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('password-update') }}">
                                @csrf
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success"> {{ session('success') }}</div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger"> {{ session('error') }}</div>
                                    @endif
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Old
                                            Password</label>

                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="current_password"
                                                placeholder="Enter Old Password">
                                            @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">New
                                            Password</label>

                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="new_password"
                                                placeholder="Enter New Password">
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm
                                            Password</label>

                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="new_confirm_password"
                                                placeholder="Enter New Confirm Password">
                                            @error('new_confirm_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
