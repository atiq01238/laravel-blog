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
                                        <select class="form-control" id="categorySelect" name="category_id" value="{{ old('category_id') }}">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="SubCategoryName">Select SubCategory</label>
                                        <select class="form-control" id="subcategorySelect" name="subcategory_id" value="{{ old('subcategory_id') }}">
                                            <option selected disabled>Select SubCategory</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
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
                                        <textarea class="form-control" placeholder="Leave a comment here" name="short_description" id="floatingTextarea"  style="height: 70px"></textarea>

                                    </div>
                                    @if ($errors->has('short_description'))
                                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                    @endif
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Long Detail</label>
                                        <textarea class="form-control" name="long_description" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    </div>
                                    @if ($errors->has('long_description'))
                                    <span class="text-danger">{{ $errors->first('long_description') }}</span>
                                    @endif
                                    <div class="mb-3">
                                        <label for="PostAutherName" class="form-label">Auther Name</label>
                                        <input type="text" class="form-control" id="auther" name="auther"
                                            placeholder="AutherName" value="{{ old('auther') }}">
                                    </div>
                                    @if ($errors->has('auther'))
                                    <span class="text-danger">{{ $errors->first('auther') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile" value="{{ old('image') }}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <label for="tac">
                                        <input id="tac" type="checkbox" name="terms-and-conditions" />
                                        I agree to the Terms and Conditions
                                    </label>

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
