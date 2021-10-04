@extends('admin.pages.employee.layouts.employeelayout')

@section('pagename')
    Employee
@endsection



@section('employeesidebar')
@include('admin.pages.employee.sidebar.addemployeesidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Employee</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.employee') }}">Employee</a></li>
                                <li class="breadcrumb-item active">Add Employee</li>
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
                                            <h3 class="card-title">Employee Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->


                                    <form  class="form-horizontal" action="{{ route('admin.addemployee.store') }}" method="POST">
                                        @csrf
                                            <div class="card-body">
                                                <x-alert></x-alert>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Employee Name</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="name" class="form-control" placeholder="Enter Employee Name" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">EmployeeID</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="employeeid" class="form-control" placeholder="Enter Employee Unique ID" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Position</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="position" class="form-control" placeholder="Enter Position" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Salary</label>
                                                <div class="col-sm-6">
                                                <input type="number" name="salary" class="form-control" placeholder="Enter Salary in Number" required="">
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label f class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="phone" class="form-control" placeholder="01XXXXXXXXX" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-6">
                                                <input type="email" name="email" class="form-control" placeholder="xyz@email.com" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-6">
                                                <input id="pro_name" type="text" name="address" class="form-control" placeholder="Enter Address" required="">
                                                </div>
                                            </div>




                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" class="btn btn-success btn-2">Submit</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.employee') }}">Go Back</a>
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







