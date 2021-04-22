@extends('admin.pages.product.layouts.unitlayout')

@section('pagename')
    Unit
@endsection




@section('productsidebar')
@include('admin.pages.product.sidebar.unitsidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Unit</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.unit') }}">Unit</a></li>
                                <li class="breadcrumb-item active">{{ $unit[0]->unit }}</li>
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
                                            <h3>{{ $unit[0]->name }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.unit') }}" class="btn btn-warning text-right addbtn">
                                                <span>Other Units</span>
                                            </a>

                                            <a href="{{ route('admin.addunit') }}" class="btn btn-warning text-right addbtn">
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
                                            <h4 class="text-center pt-3"><b>{{ $unit[0]->unit }}</b></h4>
                                        </div>
                                        <div class="card-body">
                                          <a href="{{ route('admin.unit') }}" class="btn btn-primary m-2">Go Back</a>
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

