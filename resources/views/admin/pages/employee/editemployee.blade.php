@extends('admin.pages.employee.layouts.employeelayout')

@section('pagename')
    Update Employee
@endsection



@section('employeesidebar')
@include('admin.pages.employee.sidebar.employeesidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Update Employee</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.employee') }}">Employee</a></li>
                                <li class="breadcrumb-item active">Update Employee</li>
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
                                            <h3 class="card-title">Update Employee Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->


                                    <form  class="form-horizontal" action="{{ route('admin.updateemployee.update',$employee[0]->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <div class="card-body">
                                                <x-alert></x-alert>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Employee Name</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="name" class="form-control" value="{{ $employee[0]->name }}" placeholder="Enter employee Name" required="">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label f class="col-sm-2 col-form-label">ID</label>
                                                <div class="col-sm-6">
                                                <input type="text"  class="form-control" value="{{ $employee[0]->employeeid }}" readonly>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label f class="col-sm-2 col-form-label">Salary</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="salary" class="form-control" value="{{ $employee[0]->salary }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label f class="col-sm-2 col-form-label">Position</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="position" class="form-control" value="{{ $employee[0]->position }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label f class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="com_phone" class="form-control" value="{{ $employee[0]->phone }}" placeholder="01XXXXXXXXX" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-6">
                                                <input type="email" value="{{ $employee[0]->email }}" name="email" class="form-control" placeholder="xyz@email.com" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="com_address" value="{{ $employee[0]->address }}" class="form-control" placeholder="Enter Address" required="">
                                                </div>
                                            </div>




                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" class="btn btn-success btn-2">Update</button>
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







