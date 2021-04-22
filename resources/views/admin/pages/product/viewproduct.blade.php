@extends('admin.pages.product.layouts.productlayout')

@section('pagename')
    Product
@endsection



@section('productsidebar')
@include('admin.pages.product.sidebar.productsidebar')
@endsection


@section('admincontent')






        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Product</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Product</a></li>
                                <li class="breadcrumb-item active">{{ $product[0]->pro_name }}</li>
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
                                            <h3>{{ $product[0]->pro_name }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.product') }}" class="btn btn-warning text-right addbtn">
                                                <span>Other Products</span>
                                            </a>

                                            <a href="{{ route('admin.addproduct') }}" class="btn btn-warning text-right addbtn">
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
                                            <h4 class="text-center pt-3"><b>{{ $product[0]->pro_name }}</b></h4>
                                            <h5>{{ $product[0]->pro_code }}</h5>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($companies as $company)
                                                @if ($company->id==$product[0]->com_id)
                                                    <h5><b>Company: {{ $company->com_name }}</b></h5>
                                                @endif
                                            @endforeach

                                            <h5>Available: {{ $product[0]->pro_quantity }}</h5>
                                            <h5>Purchasing Price: {{ $product[0]->pro_purchasing }}</h5>
                                            <h5>Selling Price: {{ $product[0]->pro_selling }}</h5>
                                            <h5>Description: {{ $product[0]->pro_description }}</h5>

                                          <a href="{{ route('admin.product') }}" class="btn btn-primary m-2">Go Back</a>
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

