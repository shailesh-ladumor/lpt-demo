@extends('layouts.app')
@section('title')
    Categories 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('categories.create')}}" class="btn btn-primary form-btn">Category <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('categories.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

