@extends('admin.pages.showroom.layouts.showroomlayout')

@section('pagename')
    Update Showroom
@endsection





@section('showroomsidebar')
@include('admin.pages.showroom.sidebar.showroomsidebar')
@endsection

@section('admincontent')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Update Showroom</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.showroom') }}">Showroom</a></li>
                                <li class="breadcrumb-item active">Update Showroom</li>
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
                                            <h3 class="card-title">Update Showroom Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->


                                    <form  class="form-horizontal" action="{{ route('admin.updateshowroom.update',$showroom[0]->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <div class="card-body">
                                                <x-alert></x-alert>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Showroom Name</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="name" class="form-control" value="{{ $showroom[0]->name }}" placeholder="Enter showroom Name" required="">
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label f class="col-sm-2 col-form-label">Location</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="location" class="form-control" value="{{ $showroom[0]->location }}" placeholder="Enter Showroom Location" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-6">
                                                <input type="email" name="email" class="form-control" value="{{ $showroom[0]->email }}" placeholder="xyz@email.com" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-6">
                                                <input type="text" value="{{ $showroom[0]->phone }}" name="phone" class="form-control" placeholder="01XXXXXXXXX"  >
                                                </div>
                                            </div>





                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" class="btn btn-success btn-2">Update</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.showroom') }}">Go Back</a>
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







