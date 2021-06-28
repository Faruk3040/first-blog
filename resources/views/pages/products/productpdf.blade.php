<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>

<body>
    <div class="row">
        <div class="col-7">
            <h3 class="text-left">Products</h3>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0 table-dark" style="height: 300px;">
                    <table border="1" class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Height</th>
                                <th scope="col">Width</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Size</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td scope="row">{{ $product->id }}</td>
                                    <td scope="row">{{ $product->users->name }}</td>
                                    <td scope="row">{{ $product->category->name }}</td>
                                    <td scope="row">{{ $product->name }}</td>
                                    <td scope="row">{{ $product->description }}</td>
                                    <td scope="row">{{ $product->unit_price }}</td>
                                    <td scope="row">{{ $product->height }}</td>
                                    <td scope="row">{{ $product->width }}</td>
                                    <td scope="row">{{ $product->weight }}</td>
                                    <td scope="row">{{ $product->size }}</td>
                                    <td>
                                        @if ($product->status == 1)
                                            <button class="btn btn-sm btn-outline-dark bg bg-success">Active</button>
                                        @else
                                            <button class="btn btn-sm btn-outline-dark bg bg-danger">Inactive</button>
                                        @endif
                                    </td>
                                    <td scope="row">{{ $product->created_at }}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
