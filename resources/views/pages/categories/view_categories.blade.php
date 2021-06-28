@extends('welcome')

@section('content')
    <div class="row">
        <div class="col-8">
            <h3 class="text-left">Categories</h3>
            <div class="col-6 pt-2  ml-0">
                <a href="{{ route('categories.add_new_category') }}" class="btn btn-info text-white">Add New</a>
                <a href="/Export" class="btn btn-info text-white">Excel Sheet</a>
                <a href="{{ route('categories.GeneratePDF', ['download' => 'pdf']) }}" class="btn btn-info text-white">PDF
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
                                <th>User</th>
                                <th>Alias</th>
                                <th>Status</th>
                                <th>Created At</th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->users->name }}</td>
                                    <td>{{ $category->alias }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                            <button class="btn btn-sm btn-outline-dark bg bg-success">Active</button>
                                        @else
                                            <button class="btn btn-sm btn-outline-dark bg bg-danger">Inactive</button>
                                        @endif
                                    </td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-dark"
                                            href="{{ route('categories.edit', $category->id) }}">Edit</a> |

                                        <!--------delete------>

                                        <form action="{{ route('categories.delete', $category->id) }}" method="POST"
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
