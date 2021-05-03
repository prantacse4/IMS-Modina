@extends('admin.pages.payment.by_dealer.layouts.paymentlayout')

@section('pagename')
    Payment
@endsection


@section('extracsscdn')
@include('admin.layouts.datatablescdncss')
@endsection



@section('paymentsidebar')
@include('admin.pages.payment.by_dealer.sidebar.paymentsidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Payment History</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Payment</li>
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
                                            <h3>Payment History</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.dealeraddpayment') }}" class="btn btn-warning text-right addbtn">
                                                <i class="fas fa-plus"></i>
                                                <span> Add Payment</span>
                                            </a>

                                            <a href="{{ route('admin.dealerpayment') }}" class="btn btn-warning text-right addbtn">
                                                <i class="far fa-eye"></i>
                                                <span> View Balance

                                                </span>
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
                                                <th>Dealer</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($dealerpayments as $dealerpayment)
                                            <tr>
                                                @foreach ($dealers as $dealer)
                                                @if ($dealer->id == $dealerpayment->dealer_id)
                                                <td>{{ $dealer->name }}</td>
                                                @endif
                                                @endforeach
                                                <td>{{$dealerpayment->amount}}</td>
                                                <td>{{$dealerpayment->date}}</td>

                                                <td>

                                                    <button  class="btn btn-danger acbtn2"
                                                    onclick="event.preventDefault();document.getElementById('form-delete-id-{{ $dealerpayment->id }}').submit();">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </button>
                                                    <form id="{{ 'form-delete-id-'.$dealerpayment->id }}" action="{{route('admin.deletepaymenthistory',$dealerpayment->id)}}" method="POST" style="display: none;">
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

