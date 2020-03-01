@extends('layouts.dashboard')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Borrower</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Borrowers</li>
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
                        <h3 class="card-title">Borrower</h3>
                    </div>
                    <form action="{{ url('/dashboard/borrower/' . $borrower->id) }}" method="post" role="form">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $borrower->name }}" id="name" name="name" placeholder="Enter name" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            {{-- <div class="form-group">
                                <label for="sex">Sex</label>
                                <input type="text" class="form-control @error('sex') is-invalid @enderror" value="{{ old('sex') ? old('sex') : $borrower->sex }}" id="sex" name="sex" placeholder="Enter sex" required autocomplete="sex">
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex" required autocomplete="sex">
                                    <option 
                                        value='Male'
                                        @if('Male' ==  (old('sex') ? old('sex') : $borrower->sex) )
                                        selected
                                        @endif
                                    >
                                        Male
                                    </option>
                                    <option 
                                        value='Female'
                                        @if('Female' ==  (old('sex') ? old('sex') : $borrower->sex) )
                                        selected
                                        @endif
                                    >
                                        Female
                                    </option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') ? old('date_of_birth') : $borrower->date_of_birth }}" id="date_of_birth" name="date_of_birth" required autocomplete="date_of_birth">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ? old('phone') : $borrower->phone }}" id="phone" name="phone" placeholder="Enter phone" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('/dashboard/borrower') }}" class="btn btn-primary">Cancel</a>
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