@extends('admin.pages.payment.by_dealer.layouts.paymentlayout')

@section('pagename')
    Payment
@endsection


@section('extracsscdn')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('paymentsidebar')
@include('admin.pages.payment.by_dealer.sidebar.addpaymentsidebar')
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.dealerpayment') }}">payment</a></li>
                                <li class="breadcrumb-item active">Add Payment</li>
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
                                            <h3 class="card-title">Payment Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form  class="form-horizontal" action="{{ route('admin.dealeraddpayment.store') }}" method="POST" >
                                            @csrf
                                            <div class="card-body">
                                                <x-alert></x-alert>



                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Dealer Name</label>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <select class="form-control select2 select2-info" required
                                                        data-dropdown-css-class="select2-info" style="width: 100%;" name="dealer_id">
                                                        <option value="" selected>Select Dealer</option>
                                                        @foreach ($dealers as $dealer)
                                                        <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Amount</label>
                                                <div class="col-sm-6">
                                                <input type="number" name="amount" class="form-control" placeholder="0" value="0" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-6">
                                                <input type="datetime-local" value="{{Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')}}" name="date" class="form-control" required>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" name="submit2" class="btn btn-success btn-2">Submit</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.payment') }}">Go Back</a>
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





@section('extrajscdn')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
            //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>

@endsection


