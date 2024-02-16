@extends('layout.master')
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
                                <h3 class="card-title">All Posts</h3>
                            </div>
                            <div class="btn-group">
                                <a href="{{ Route('posts.create') }}" class="btn btn-info">Add Post</a>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body">
                                @include('partials.message')
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>SubCategory Name</th>
                                            <th>Post Name</th>
                                            <th>Short_Detail</th>
                                            <th>Long_Detail</th>
                                            <th>Auther Name</th>
                                            <th>Image</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr class="">
                                                <td>{{ $post['id'] }}</td>
                                                <td>{{ $post['category']->name ?? '' }}</td>
                                                <td>{{ $post['sub_category']->name ?? '' }}</td>
                                                <td>{{ $post['name'] ?? '' }}</td>
                                                <td>{{ $post['short_description'] }}</td>
                                                <td>{{ $post['long_description'] }}</td>
                                                <td>{{ $post['auther'] }}</td>
                                                <td>
                                                    <img src="{{ asset($post->image) }}" class="rounded-circle"
                                                        width="50px" height="50px" alt="">
                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ Route('posts.edit', $post->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <form id="deleteForm"
                                                            action="{{ route('posts.destroy', $post->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                style="margin-left: 10px;"
                                                                onclick="deletePost()">Delete</button>
                                                        </form>

                                                        <script>
                                                            function deletePost() {
                                                                if (confirm("Are you sure you want to delete this post?")) {
                                                                    var xhr = new XMLHttpRequest();
                                                                    xhr.open('POST', document.getElementById('deleteForm').action, true);
                                                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                                    xhr.setRequestHeader('X-CSRF-TOKEN', document.getElementsByName('_token')[0].value);

                                                                    xhr.onload = function() {
                                                                        if (xhr.status === 200) {
                                                                            // Handle success, e.g., update the UI or redirect
                                                                            window.location.href = "{{ route('posts.index') }}";
                                                                        } else {
                                                                            // Handle errors, e.g., display an error message
                                                                            console.error(xhr.responseText);
                                                                        }
                                                                    };

                                                                    xhr.send();
                                                                }
                                                            }
                                                        </script>

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
