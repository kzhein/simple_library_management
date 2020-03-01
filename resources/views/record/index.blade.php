@extends('layouts.dashboard')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Records</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Records</li>
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


        <div class="row">
            <div class="col-12">
                <div class="box bg-white p-3 mt-3 mb-3">
                    <div class="box-header">
                        <h3 class="box-title">All records</h3>
                    </div>
                    <div class="box-body table-responsive p-0">
                        <table class="table table-bordered table-hover text-nowrap data-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Borrower</th>
                                    <th>Book</th>
                                    <th>Borrowed From</th>
                                    <th>Borrowed To</th>
                                    <th>Actual Return</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->borrower->name }}</td>
                                <td>{{ $record->book->title }}</td>
                                <td>{{ $record->borrowed_from }}</td>
                                <td>{{ $record->borrowed_to }}</td>
                                <td>
                                    @if($record->actual_return == NULL)
                                    <span class="bg-red p-2">Pending</span>
                                    @else
                                    {{ $record->actual_return }}
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Action</th>
                                    <th>Book</th>
                                    <th>Borrower</th>
                                    <th>Borrowed From</th>
                                    <th>Borrowed To</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    {{--
                    Pagination function provided by laravel
                
                    <div class="card-footer clearfix">
                        {{ $borrowers->links() }}
                    </div>
                    --}}
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

        if( !$('#nav-record').hasClass('active') ) {
            $('#nav-record').addClass('active');
        }

        // rotate the arrow
        $('#nav-wrap').addClass('menu-open');

        // show the treeview items
        $('#nav-transaction-content').show();

    }


</script>

@endsection