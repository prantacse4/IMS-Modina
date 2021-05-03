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
                            <h1 class="m-0 text-dark">Payment</h1>
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
                                            <h3>Payment</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('admin.dealeraddpayment') }}" class="btn btn-warning text-right addbtn">
                                                <i class="fas fa-plus"></i>
                                                <span> Add Payment</span>
                                            </a>

                                            <a href="{{ route('admin.dealerviewallpayments') }}" class="btn btn-warning text-right addbtn">
                                                <i class="far fa-eye"></i>
                                                <span> View all payments

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
                                                <th>Balance</th>
                                                <th>Due</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($balancedealers as $balancedealer)
                                            <tr>
                                                @foreach ($dealers as $dealer)
                                                @if ($balancedealer->dealer_id == $dealer->id)
                                                <td>{{ $dealer->name }}</td>
                                                @endif
                                                @endforeach

                                                @if ($balancedealer->balance <= 0 )
                                                    <td>0</td>

                                                @else
                                                    <td>{{$balancedealer->balance}}</td>
                                                @endif


                                                {{-- Due --}}
                                                @if ($balancedealer->balance < 0 )
                                                    <td>{{ $balancedealer->balance-$balancedealer->balance-$balancedealer->balance }}</td>

                                                @else
                                                    <td>0</td>
                                                @endif



                                                <td>


                                                    <a href="{{ route('admin.editbalance',$balancedealer->id) }}" class="btn btn-info acbtn2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>



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

