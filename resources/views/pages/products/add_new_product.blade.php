@extends('welcome')
@section('content')
<div class="row">
    <div class="col-12  pt-3">
        <div class=" d-flex align-items-center justify-content-between">
            <h3 >Create Product</h3>
            <a href="{{ route('products.view_product') }}" class="btn btn-info text-white">Product List</a>
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
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                        @if(session('success'))
                         <div class="alert alert-success"> {{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger"> {{ session('error') }}</div>
                       @endif
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="created_by_id" >User</label>
                        <span class="form-control"> {{ auth()->user()->name}}</span>

                    </div>
                      <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Please Choose</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        @error('category_id')
                        <span class="text-danger">{{ $message  }}</span>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" >
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="unit_price">Unit Price</label>
                        <input type="text" name="unit_price" class="form-control" id="unit_price" placeholder="Enter unit_price">
                        @error('unit_price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="height">Height</label>
                        <input type="text" name="height" class="form-control" id="height" placeholder="Enter height">
                        @error('height')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="width">Width</label>
                        <input type="text" name="width" class="form-control" id="width" placeholder="Enter width">
                        @error('width')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="text" name="weight" class="form-control" id="weight" placeholder="Enter weight">
                        @error('weight')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" name="size" class="form-control" id="size" placeholder="Enter size">
                        @error('size')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                           <select name="status" class="form-control" id="status" placeholder="Enter status ">
                              <option value="">--Please choose an option--</option>
                              <option value="0">Inactive</option>
                              <option value="1">Active</option>

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
