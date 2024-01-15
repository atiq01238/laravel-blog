@include('layout.asset')
<!-- Navbar -->
@include('layout.navbar')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('layout.sidebar')


<!-- Content Wrapper. Contains page content -->
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
                    <!-- ./card-header -->
                    <div class="card-body">
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
                            @foreach ($category as $item)
                                <tr class="">
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        <img src="{{asset('categories/'.$item->image)}}"
                                        class="rounded-circle" width="50px" height="50px" alt="">
                                    </td>
                                    <td>{{ $item['created_at'] }}</td>
                                    <td>{{ $item['updated_at'] }}</td>
                                    <td>
                                        <a href="" class="btn btn-info">Edit</a>
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


<!-- /.content-wrapper -->
@include('layout.footer')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
