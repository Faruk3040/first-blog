<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<body>
    <div class="container">
        <h3 class="text-left">Categories</h3>
        <table border="1" class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created_At</th>


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



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
