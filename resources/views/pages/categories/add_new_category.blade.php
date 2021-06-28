@extends('welcome')
@section('content')
<div class="row">
    <div class="col-12  pt-3">
        <div class=" d-flex align-items-center justify-content-between">
            <h3 >Create Category</h3>
            <a href="{{ route('categories.view_categories') }}" class="btn btn-info text-white">Category List</a>
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
                <form action="{{ route('categories.store') }}" method="POST" >
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
                        <label for="alias">Alias</label>
                        <input type="text" name="alias" class="form-control" id="alias" placeholder="Enter alias">
                        @error('alias')
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
