@extends('admin.pages.product.layouts.unitlayout')

@section('pagename')
    Unit
@endsection

@section('extracsscdn')
@include('admin.layouts.datatablescdncss')
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
                            <h1 class="m-0 text-dark">Product Unit</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Product Unit</li>
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
                                            <h3>Units</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.addunit') }}" class="btn btn-success text-right addbtn">
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
                                                <th>Serial</th>
                                                <th>Units</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($units as $unit)
                                            <tr>

                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $unit->unit }}</td>

                                                <td>
                                                    <a href="{{ route('admin.unitviewer',$unit->id) }}" class="btn btn-info acbtn2">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.editunit', $unit->id) }}" class="btn btn-secondary acbtn2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button  class="btn btn-danger acbtn2"
                                                    onclick="event.preventDefault();document.getElementById('form-delete-id-{{ $unit->id }}').submit();">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                    <form id="{{ 'form-delete-id-'.$unit->id }}" action="{{route('admin.deleteunit',$unit->id)}}" method="POST" style="display: none;">
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
