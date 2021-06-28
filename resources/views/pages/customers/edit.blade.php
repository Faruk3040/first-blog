@extends('welcome')

@section('content')
    <div class="row">
        <div class="col-12  pt-3">
            <div class=" d-flex align-items-center justify-content-between">
                <h3>Edit Customer</h3>
                <a href="{{ route('customers.view_customer') }}" class="btn btn-info text-white">Customer List</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="{{ route('customers.update', $customer->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success"> {{ session('success') }}</div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger"> {{ session('error') }}</div>
                                    @endif
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $customer->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{ $customer->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile_num">Mobile Number</label>
                                        <input type="text" name="mobile_num" class="form-control" id="mobile_num"
                                            placeholder="Enter mobile_num">
                                        @error('mobile_num')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <img width="80" src="{{ asset("storage/$customer->image") }}">

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            placeholder="Enter address">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="">--Please choose an option--</option>
                                            @if ($customer->status == 0)
                                                <option value="0" selected>Inactive</option>
                                                <option value="1">Active</option>
                                            @else
                                                <option value="0">Inactive</option>
                                                <option value="1" selected>Active</option>
                                            @endif
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer bg-transparent">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
