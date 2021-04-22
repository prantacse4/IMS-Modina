@extends('admin.pages.showroom.layouts.showroomlayout')

@section('pagename')
    Showroom
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
                            <h1 class="m-0 text-dark">Showroom</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.showroom') }}">Showroom</a></li>
                                <li class="breadcrumb-item active">{{ $showroom[0]->name }}</li>
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

                            <div class="card">
                                <div class="card-header bg-primary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ptitle">
                                            <h3>{{ $showroom[0]->name }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.showroom') }}" class="btn btn-warning text-right addbtn">
                                                <span>Other Showrooms</span>
                                            </a>

                                            <a href="{{ route('admin.addshowroom') }}" class="btn btn-warning text-right addbtn">
                                                <span> Add New</span>
                                            </a>
                                        </div>
                                </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">{{session()->get('message')}}</div>
                                    @endif


                                    <div class="card text-center">
                                        <div class="card-header">
                                            <h4 class="text-center pt-3"><b>{{ $showroom[0]->name }}</b></h4>
                                            <h5>{{ $showroom[0]->location }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="text-center"><i class="fas fa-phone"></i> Phone: {{ $showroom[0]->phone }}</h5>

                                            <h5 class="text-center"><i class="fas fa-envelope"></i> Email: {{ $showroom[0]->email }}</h5>

                                          <a href="{{ route('admin.showroom') }}" class="btn btn-primary m-2">Go Back</a>
                                        </div>
                                        <div class="card-footer text-muted">

                                        </div>
                                      </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
        </div>



        @endsection



        @section('extrajscdn')
        @include('admin.layouts.datatablescdn')
        @endsection

