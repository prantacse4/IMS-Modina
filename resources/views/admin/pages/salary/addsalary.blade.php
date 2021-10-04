@extends('admin.pages.salary.layouts.salarylayout')

@section('pagename')
    Salary
@endsection



@section('salarysidebar')
@include('admin.pages.salary.sidebar.addsalarysidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Salary</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.salary') }}">Salary</a></li>
                                <li class="breadcrumb-item active">Add Salary</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->




                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->



                                <div class="container-fluid">
                                    <!-- main body start from here -->

                                    <!-- Horizontal Form -->
                                        <div class="card card-info ">
                                        <div class="card-header">
                                            <h3 class="card-title">Salary Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->


                                    <form  class="form-horizontal" action="{{ route('admin.addsalary.store') }}" method="POST">
                                        @csrf
                                            <div class="card-body">
                                                <x-alert></x-alert>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Employee ID</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="name" class="form-control" placeholder="Enter salary Name" required="">
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label f class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="com_phone" class="form-control" placeholder="01XXXXXXXXX" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-6">
                                                <input type="email" name="com_email" class="form-control" placeholder="xyz@email.com" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-6">
                                                <input id="pro_name" type="text" name="com_address" class="form-control" placeholder="Enter Address" required="">
                                                </div>
                                            </div>




                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" class="btn btn-success btn-2">Submit</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.salary') }}">Go Back</a>
                                                </div>
                                            </div>


                                            </div>
                                            <!-- /.card-body -->
                                        </form>
                                        </div>
                                        <!-- /.card -->


                                </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->















        </div>



        @endsection







