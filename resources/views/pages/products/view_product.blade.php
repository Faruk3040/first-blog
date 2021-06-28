@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-8 ">
            <h3>Products</h3>
            <div class="col-6 pt-2 mt-0">

                <a href="{{ route('products.add_new_product') }}" class="btn btn-info text-white">Add New</a>
                <a href="/export" class="btn btn-info text-white">Excel Sheet</a>
                <a href="{{ route('products.generatePDF', ['download' => 'pdf']) }}" class="btn btn-info text-white">PDF
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
                                <th>User</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Unit Price</th>
                                <th>Height</th>
                                <th>Width</th>
                                <th>Weight</th>
                                <th>Size</th>
                                <th>Status</th>
                                <th>Created At</th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->users->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img width="60"
                                            src="{{ asset('storage/app/public/products/' . $product->image) }}"></td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->unit_price }}</td>
                                    <td>{{ $product->height }}</td>
                                    <td>{{ $product->width }}</td>
                                    <td>{{ $product->weight }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>
                                        @if ($product->status == 1)
                                            <button class="btn btn-sm btn-outline-dark bg bg-success">Active</button>
                                        @else
                                            <button class="btn btn-sm btn-outline-dark bg bg-danger">Inactive</button>
                                        @endif
                                    </td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-dark"
                                            href="{{ route('products.edit', $product->id) }}">Edit</a> |

                                        <!--------delete------>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
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
