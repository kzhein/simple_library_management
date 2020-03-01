@extends('layouts.dashboard')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->





<section class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-2"></div>

            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Category</h3>
                    </div>
                    <form action="{{ url('/dashboard/category/' . $category->id) }}" method="post" role="form">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $category->name }}" id="name" name="name" placeholder="Enter category name" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('/dashboard/category') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-2"></div>
        </div>


    </div>

</section>













<script>

setCurrentTab();

function setCurrentTab() {

    let current = document.querySelector('#nav-borrowers');
    if(!current.classList.contains('active')) {
        current.classList.add('active');
    }
}

</script>

@endsection