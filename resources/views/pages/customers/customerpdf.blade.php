<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
</head>

<body>
    <div class="row">
        <div class="col-7">
            <h3 class="text-left">Customers</h3>

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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td scope="row">{{ $customer->id }}</td>
                                    <td scope="row">{{ $customer->name }}</td>
                                    <td scope="row">{{ $customer->email }}</td>
                                    <td scope="row">{{ $customer->mobile_num }}</td>
                                    <td scope="row">{{ $customer->address }}</td>
                                    <td>
                                        @if ($customer->status == 1)
                                            <button class="btn btn-sm btn-outline-dark bg bg-success">Active</button>
                                        @else
                                            <button class="btn btn-sm btn-outline-dark bg bg-danger">Inactive</button>
                                        @endif
                                    </td>
                                    <td scope="row">{{ $customer->created_at }}</td>


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
