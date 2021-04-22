@extends('admin.pages.product.layouts.productlayout')

@section('pagename')
    Product
@endsection

@section('extracsscdn')
@include('admin.layouts.datatablescdncss')
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
                                <li class="breadcrumb-item active">Product</li>
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
                                <div class="card-header bg-secondary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="ptitle">
                                            <h3>Products</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.addproduct') }}" class="btn btn-success text-right addbtn">
                                                <i class="fas fa-plus"></i>
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
                                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Do</th>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Quantity</th>
                                                <th>MRP</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                        <p class="acbtn"><a href="#"><i class="fas fa-print"></i> Print</a></p>
                                                </td>
                                                <td>{{ $product->pro_name }}</td>
                                                <td>{{ $product->pro_code }}</td>
                                                <td>{{ $product->pro_quantity }}</td>
                                                <td>{{ $product->pro_selling }}</td>
                                                <td>
                                                    <a href="{{ route('admin.productviewer',$product->id) }}" class="btn btn-info acbtn2">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.editproduct', $product->id) }}" class="btn btn-secondary acbtn2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button  class="btn btn-danger acbtn2"
                                                    onclick="event.preventDefault();document.getElementById('form-delete-id-{{ $product->id }}').submit();">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                    <form id="{{ 'form-delete-id-'.$product->id }}" action="{{route('admin.deleteproduct',$product->id)}}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('delete')
                                                        </form>
                                                </td>
                                            </tr>


                                            @endforeach

                                        </tbody>

                                    </table>
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
