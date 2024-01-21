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
                                <a href="{{ Route('subcategories.create') }}"
                                    class="btn btn-info">Add SubCategories</a>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body">
                                @if ($messege = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <strong>{{ $messege }}</strong>
                                    </div>
                                @endif
                                {{-- Delete category --}}
                                @if ($messege = Session::get('delete'))
                                    <div class="alert alert-danger alert-block">
                                        <strong>{{ $messege }}</strong>
                                    </div>
                                @endif
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SubCategory Name</th>
                                            <th>Category ID</th>
                                            <th>SubCategoryImage</th>
                                            <th>Create_at</th>
                                            <th>Updated_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $subcategory)
                                            <tr class="">
                                                <td>{{ $subcategory['name'] }}</td>
                                                <td>{{$subcategory->categories->name ?? '' }}</td>
                                                <td>
                                                    <img src="{{ asset('subcategories/' . $subcategory->image) }}"
                                                        class="rounded-circle" width="50px" height="50px" alt="">
                                                </td>
                                                <td>{{ $subcategory['created_at'] }}</td>
                                                <td>{{ $subcategory['updated_at'] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ Route('subcategories.edit', $subcategory->id) }}"
                                                            class="btn btn-info mr-2">Edit</a>
                                                        <form action="{{ Route('subcategories.destroy', $subcategory->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">DELETE</button>
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
