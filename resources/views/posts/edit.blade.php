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
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Post</h3>
                            </div>
                            <form action="{{ Route('posts.update', ['post' => $posts->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="CategoryName">Select Category</label>
                                        <select class="form-control" name="category_name" value="{{ old('category_name') }}">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $post)
                                                <option value="{{ $post->name ?? '' }}">{{ $post->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="CategoryName">Select SubCategory</label>
                                        <select class="form-control" name="subcategory_name" value="{{ old('subcategory_name') }}">
                                            <option selected disabled>Select SubCategory</option>
                                            @foreach ($subcategories as $post)
                                                <option value="{{ $post->name ?? '' }}">{{ $post->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="PostName" class="form-label">Post Name</label>
                                        <input type="text" class="form-control" id="name" name="post_name"
                                            placeholder="Name" value="{{ old('post_name', $posts->post_name) }}">
                                    </div>
                                    @if ($errors->has('post_name'))
                                    <span class="text-danger">{{ $errors->first('post_name') }}</span>
                                    @endif
                                    <div class="form-floating">
                                        <label for="floatingTextarea">Short Detail</label>
                                        <textarea class="form-control" placeholder="Leave a comment here" name="s_detail" id="floatingTextarea" style="height: 70px">{{ old('s_detail', $posts->s_detail) }}</textarea>

                                    </div>
                                    @if ($errors->has('s_detail'))
                                    <span class="text-danger">{{ $errors->first('s_detail') }}</span>
                                    @endif
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Long Detail</label>
                                        <textarea class="form-control" name="l_detail" id="exampleFormControlTextarea1" rows="5">{{ old('l_detail', $posts->l_detail) }}</textarea>
                                    </div>
                                    @if ($errors->has('l_detail'))
                                    <span class="text-danger">{{ $errors->first('l_detail') }}</span>
                                    @endif
                                    <div class="mb-3">
                                        <label for="PostAutherName" class="form-label">Auther Name</label>
                                        <input type="text" class="form-control" id="a_name" name="a_name"
                                            placeholder="AutherName" value="{{ old('a_name', $posts->a_name) }}">
                                    </div>
                                    @if ($errors->has('a_name'))
                                    <span class="text-danger">{{ $errors->first('a_name') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile" >
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop
