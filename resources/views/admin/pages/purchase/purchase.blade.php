@extends('admin.pages.purchase.layouts.purchaselayout')

@section('pagename')
    Purchase
@endsection


@section('extracsscdn')
@include('admin.layouts.datatablescdncss')
@endsection



@section('purchasesidebar')
@include('admin.pages.purchase.sidebar.purchasesidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Purchase</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Purchase</li>
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
                                            <h3>Purchase</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.selectpurchasecompany') }}" class="btn btn-success text-right addbtn">
                                                <i class="fas fa-plus"></i>
                                                <span> Purchase Product</span>
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
                                                <th>Purchase ID</th>
                                                <th>Company</th>
                                                <th>Showroom</th>
                                                <th>Total</th>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>



                                        <tbody>
                                        @foreach ($records as $record)

                                            <tr>
                                                <td>{{$record->id}}</td>
                                                @foreach ($companies as $company)
                                                    @if ($record->company==$company->id)
                                                    <td>{{$company->com_name}}</td>
                                                    @endif
                                                @endforeach
                                                @foreach ($dealers as $dealer)
                                                    @if ($record->dealer==$dealer->id)
                                                    <td>{{$dealer->name}}</td>
                                                    @endif
                                                @endforeach
                                                @foreach ($showrooms as $showroom)
                                                    @if ($record->showroom==$showroom->id)
                                                    <td>{{$showroom->name}}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{$record->total_amount}}</td>
                                                <td>
                                                    <button class="btn btn-info acbtn2">
                                                        <i class="far fa-eye"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-secondary acbtn2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button  class="btn btn-danger acbtn2"
                                                    onclick="event.preventDefault();document.getElementById('form-delete-id-{{ $record->id }}').submit();">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                    <form id="{{ 'form-delete-id-'.$record->id }}" action="{{route('admin.deletecompany',$record->id)}}" method="POST" style="display: none;">
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

