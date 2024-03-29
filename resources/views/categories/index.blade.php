@extends('layout.master')
<!-- Content Wrapper. Contains page content -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Categories</h3>
                            </div>
                            <div class="btn-group">
                                <a href="{{ Route('categories.create') }}" class="btn btn-info">Add Categories</a>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body">
                                @include('partials.message')
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Image</th>
                                            <th>Create_at</th>
                                            <th>Updated_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="">
                                                <td>{{ $category['id'] }}</td>
                                                <td>{{ $category['name'] }}</td>
                                                <td>
                                                    <img src="{{ asset('categories/' . $category->image) }}"
                                                        class="rounded-circle" width="50px" height="50px" alt="">
                                                </td>
                                                <td>{{ $category['created_at'] }}</td>
                                                <td>{{ $category['updated_at'] }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ Route('categories.edit', $category->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop
