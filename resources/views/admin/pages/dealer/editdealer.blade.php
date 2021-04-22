@extends('admin.pages.dealer.layouts.dealerlayout')

@section('pagename')
   Update Dealer
@endsection



@section('dealersidebar')
@include('admin.pages.dealer.sidebar.dealersidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dealer</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.dealer') }}">Dealer</a></li>
                                <li class="breadcrumb-item active">Update Dealer</li>
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
                                            <h3 class="card-title">Update Dealer Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form  class="form-horizontal" action="{{ route('admin.updatedealer.update',$dealer[0]->id) }}" method="POST" >
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                                <x-alert></x-alert>


                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-6">
                                                <input  type="text" name="name" value="{{ $dealer[0]->name }}" class="form-control" placeholder="Enter dealer Name" required>
                                                </div>
                                            </div>





                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="phone" value="{{ $dealer[0]->phone }}"  class="form-control" placeholder="Phone No" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-6">
                                                <input type="text" name="address"  value="{{ $dealer[0]->address }}" class="form-control" placeholder="Dealer Local Address" required>
                                                </div>
                                            </div>




                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" name="submit2" class="btn btn-success btn-2">Update</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.dealer') }}">Go Back</a>
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







