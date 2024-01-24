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
                <div class="row" style="padding: 50px">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Post</h3>
                            </div>
                            <form action="{{ Route('posts.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="CategoryName">Select Category</label>
                                        <select class="form-control" name="category_id" value="{{ old('category_id') }}">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $post)
                                                <option value="{{ $post->id ?? '' }}">{{ $post->name ?? '' }}</option>
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
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" value="{{ old('name') }}">
                                    </div>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <div class="form-floating">
                                        <label for="floatingTextarea">Short Detail</label>
                                        <textarea class="form-control" placeholder="Leave a comment here" name="sdetail" id="floatingTextarea"  style="height: 70px"></textarea>

                                    </div>
                                    @if ($errors->has('sdetail'))
                                    <span class="text-danger">{{ $errors->first('sdetail') }}</span>
                                    @endif
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Long Detail</label>
                                        <textarea class="form-control" name="ldetail" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    </div>
                                    @if ($errors->has('ldetail'))
                                    <span class="text-danger">{{ $errors->first('ldetail') }}</span>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop
