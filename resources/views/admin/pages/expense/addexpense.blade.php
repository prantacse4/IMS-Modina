@extends('admin.pages.expense.layouts.expenselayout')

@section('pagename')
    Expense
@endsection



@section('expensesidebar')
@include('admin.pages.expense.sidebar.addexpensesidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Expense</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.expense') }}">Expense</a></li>
                                <li class="breadcrumb-item active">Add Expense</li>
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
                                            <h3 class="card-title">Expense Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->


                                    <form  class="form-horizontal" action="{{ route('admin.addexpense.store') }}" method="POST">
                                        @csrf
                                            <div class="card-body">
                                                <x-alert></x-alert>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Expense Amount</label>
                                                <div class="col-sm-6">
                                                <input  type="number" name="exp_amount" class="form-control" placeholder="Enter Expense Amount in Number" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Details</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="exp_details" class="form-control" placeholder="Enter Details" required="">
                                                </div>
                                            </div>

                          







                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" class="btn btn-success btn-2">Submit</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.expense') }}">Go Back</a>
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







