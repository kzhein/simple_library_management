@extends('layouts.dashboard')

@section('content')



<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Book</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Books</li>
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
                        <h3 class="card-title">Book</h3>
                    </div>
                    <form action="{{ url('/dashboard/book') }}" method="post" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="isbn">Isbn</label>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') }}" id="isbn" name="isbn" placeholder="Enter isbn" required autocomplete="isbn" autofocus>
                                @error('isbn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" name="title" placeholder="Enter title" required autocomplete="title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" id="author" name="author" placeholder="Enter author" required autocomplete="author">
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="text" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" id="year" name="year" placeholder="Enter year" required autocomplete="year">
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="language">Language</label>
                                <input type="text" class="form-control @error('language') is-invalid @enderror" value="{{ old('language') }}" id="language" name="language" placeholder="Enter language" required autocomplete="language">
                                @error('language')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" required autocomplete="category_id">
                                    @foreach($categories as $category)
                                    <option 
                                        value="{{ $category->id }}"
                                        @if($category->id == old('category_id'))
                                        selected
                                        @endif
                                    >
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_of_copies_actual">Total copies</label>
                                <input type="text" class="form-control @error('no_of_copies_actual') is-invalid @enderror" value="{{ old('no_of_copies_actual') }}" id="no_of_copies_actual" name="no_of_copies_actual" placeholder="Enter total copies" required autocomplete="no_of_copies_actual">
                                @error('no_of_copies_actual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_of_copies_current">Available copies</label>
                                <input type="text" class="form-control @error('no_of_copies_current') is-invalid @enderror" value="{{ old('no_of_copies_current') }}" id="no_of_copies_current" name="no_of_copies_current" placeholder="Enter available copies" required autocomplete="no_of_copies_current">
                                @error('no_of_copies_current')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('/dashboard/book') }}" class="btn btn-primary">Cancel</a>
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

    let current = document.querySelector('#nav-books');
    if(!current.classList.contains('active')) {
        current.classList.add('active');
    }
}

</script>

@endsection