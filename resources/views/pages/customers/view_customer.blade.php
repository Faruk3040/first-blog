@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-8 ">
            <h3>Customers</h3>
            <div class="col-6 pt-2 mt-0">

                <a href="{{ route('customers.add_new_customer') }}" class="btn btn-info text-white">Add New</a>
                <a href="/excel" class="btn btn-info text-white">Excel Sheet</a>
                <a href="{{ route('customers.customerpdf', ['download' => 'pdf']) }}" class="btn btn-info text-white">PDF
                    Sheet</a>

            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">

                @if (session('success'))
                    <div class="alert alert-success"> {{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger"> {{ session('error') }}</div>
                @endif
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Image</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->mobile_num }}</td>
                                    <td><img width="60" src="{{ asset("storage/$customer->image") }}"></td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        @if ($customer->status == 1)
                                            <button class="btn btn-sm btn-outline-dark bg bg-success">Active</button>
                                        @else
                                            <button class="btn btn-sm btn-outline-dark bg bg-danger">Inactive</button>
                                        @endif
                                    </td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-dark"
                                            href="{{ route('customers.edit', $customer->id) }}">Edit</a> |

                                        <!--------delete------>

                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                            style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-sm btn-outline-danger" type="submit"
                                                value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
