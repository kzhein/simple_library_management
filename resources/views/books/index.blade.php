@extends('layouts.dashboard')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Books</h1>
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

        @if(session('info'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('info') }}
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-12 m-2">
                <a href="{{ url('/dashboard/book/create') }}" class="btn btn-primary mb-2">ADD NEW</a>
            </div>
            
        </div>
        <!-- /.row -->



        <div class="row">
            <div class="col-12">
                <div class="box bg-white p-3 mt-3 mb-3">
                    <div class="box-header">
                        <h3 class="box-title">All Books</h3>
                    </div>
                    <div class="box-body table-responsive p-0">
                        <table class="table table-bordered table-hover text-nowrap data-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Isbn</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Language</th>
                                    <th>Category</th>
                                    <th>Total copies</th>
                                    <th>Avialable copies</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td>{{ $book->language }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->no_of_copies_actual }}</td>
                                    <td>{{ $book->no_of_copies_current }}</td>
                                    <td class="action">
                                        <a href="{{ url('/dashboard/book/' . $book->id . '/edit' ) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                        <form action="{{ url('/dashboard/book/' . $book->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Isbn</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Language</th>
                                    <th>Category</th>
                                    <th>Total copies</th>
                                    <th>Avialable copies</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.row -->



    </div>

</section>


<script>


    $(document).ready(function() {

        $('.data-table').dataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
        
    });




setCurrentTab();

function setCurrentTab() {


    let current = document.querySelector('#nav-books');
    if(!current.classList.contains('active')) {
        current.classList.add('active');
    }
}

</script>

@endsection