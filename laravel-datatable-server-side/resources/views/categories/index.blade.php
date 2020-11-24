@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Categories</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('categories.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('categories.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@push('scripts')

    <script>
       let categoryUrl = '{{route('categories.index')}}';
    </script>

    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

   <script>
        $(document).ready( function () {
        $('#categoryTbl').DataTable({
              processing: true,
              serverSide: true,
              ajex :{
                  ur: categoryUrl
              },
              columns: [
                  {
                      data: 'name',
                      name: 'name'
                  },
                  {
                      data: 'description',
                      name: 'description'
                  },
                  {
                    data: function (row) {
                            return '<a title="Edit" href="' + categoryUrl + '/' + row.id +
                                '/edit" class="btn action-btn btn-primary btn-sm edit-btn mr-1" data-id="' +
                                row.id + '">' +
                                ' <i class="glyphicon glyphicon-edit"></i>' + '</a>' +
                                '<a title="Delete" class="btn action-btn btn-danger btn-sm delete-btn" data-id="' +
                                row.id + '">' +
                                '<i class="glyphicon glyphicon-trash"></i></a>'
                        },
                      name: 'id'
                  }
              ]
          });
        } );
        
        $(document).on('click', '.delete-btn', function (event) {
            const id = $(event.currentTarget).data('id');
            swal({
                    title: 'Delete !',
                    text: 'Are you sure you want to delete this Category" ?',
                    type: 'warning',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonColor: '#5cb85c',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes',
                },
                function () {
                    $.ajax({
                url: categoryUrl + '/' + id,
                type: 'DELETE',
                DataType: 'json',
                data:{"_token": "{{ csrf_token() }}"},
                success: function(response){
                    swal({
                                title: 'Deleted!',
                                text: 'Category has been deleted.',
                                type: 'success',
                                timer: 2000,
                            });
                    $('#categoryTbl').DataTable().ajax.reload(null, false);
                },
                error: function(error){
                    swal({
                                title: 'Error!',
                                text: error.responseJSON.message,
                                type: 'error',
                                timer: 5000,
                            })    
                }
            });
                });
        });
   </script>

@endpush
