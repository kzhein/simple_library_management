@extends('layouts.dashboard')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rent</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Rent</li>
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


        <!-- /.row -->


  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rent the book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/dashboard/rent') }}" method="post" role="form">
                    @csrf
                    
                    <input type="hidden" name="book_id" id="book_id">

                    <div class="form-group">
                        <label for="title">Book</label>
                        <input type="text" class="form-control" value="This is a test title" id="title" name="title" required autocomplete="title" readonly>
                    </div>

                    <div class="form-group">
                        <label for="borrower_id">Borrower</label>
                        <select class="form-control select2-borrowers" name="borrower_id" id="borrower_id" required>
                            @foreach($borrowers as $borrower)
                            <option value="{{ $borrower->id }}" >
                                {{ $borrower->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="borrowed_to">Until</label>
                        <input type="date" class="form-control" id="borrowed_to" name="borrowed_to" required >
                    </div>                                

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>







        <div class="row">
            <div class="col-12">
                <div class="box bg-white p-3 mt-3 mb-3">
                    <div class="box-header">
                        <h3 class="box-title">All available Books</h3>
                    </div>
                    <div class="box-body table-responsive p-0">
                        <table class="table table-bordered table-hover text-nowrap data-table">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Id</th>
                                    <th>Isbn</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Language</th>
                                    <th>Category</th>
                                    <th>Total copies</th>
                                    <th>Avialable copies</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($availableBooks as $availableBook)
                                <tr>
                                    <td class="action">
                                        <a href="#" class="btn btn-primary" onclick="setBookId(this);" data-bookid="{{ $availableBook->id }}" data-booktitle="{{ $availableBook->title }}" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-arrow-right"></i></a>
                                    </td>
                                    <td>{{ $availableBook->id }}</td>
                                    <td>{{ $availableBook->isbn }}</td>
                                    <td>{{ $availableBook->title }}</td>
                                    <td>{{ $availableBook->author }}</td>
                                    <td>{{ $availableBook->year }}</td>
                                    <td>{{ $availableBook->language }}</td>
                                    <td>{{ $availableBook->category->name }}</td>
                                    <td>{{ $availableBook->no_of_copies_actual }}</td>
                                    <td>{{ $availableBook->no_of_copies_current }}</td>
                                    
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


        $('.select2-borrowers').select2();
        
    });




setCurrentTab();

function setCurrentTab() {

    if( !$('#nav-transaction').hasClass('active') ) {
        $('#nav-transaction').addClass('active');
    }

    if( !$('#nav-rent').hasClass('active') ) {
        $('#nav-rent').addClass('active');
    }

    // rotate the arrow
    $('#nav-wrap').addClass('menu-open');

    // show the treeview items
    $('#nav-transaction-content').show();

}

function setBookId(ele) {
    $('#book_id').val(ele.dataset.bookid);
    $('#title').val(ele.dataset.booktitle);
}



</script>

@endsection