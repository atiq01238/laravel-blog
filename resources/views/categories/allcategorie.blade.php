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
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr class="">
                                    <td>


                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-danger delete_btn" value="">Delete</button>
                                        <a href="" class="btn btn-info">Edit</a>
                                    </td>
                                </tr>
                                <tr >
                                    <td colspan="6" style="text-align: center;">No Data Found</td>
                                </tr>
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
