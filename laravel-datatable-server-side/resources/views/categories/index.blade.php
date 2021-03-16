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

    {{-- <script>
       let categoryUrl = '{{route('categories.index')}}';
    </script> --}}

    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script src="{{asset('js/category.js')}}"></script>
@endpush
