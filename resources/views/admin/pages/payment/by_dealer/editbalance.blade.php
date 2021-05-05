@extends('admin.pages.payment.by_dealer.layouts.paymentlayout')

@section('pagename')
    Update Payment
@endsection





@section('paymentsidebar')
@include('admin.pages.payment.by_dealer.sidebar.paymentsidebar')
@endsection


@section('admincontent')

<style>
    .hidden{
        display: none;
    }
</style>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Balance</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.dealerpayment') }}">Payment</a></li>
                                <li class="breadcrumb-item active">Update Balance</li>
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
                                            <h3 class="card-title">Update Balance Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form  class="form-horizontal" action="{{ route('admin.updatedealerbalance.update',$dealerbalance[0]->id) }}" method="POST" >
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                                <x-alert></x-alert>


                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Dealer</label>
                                                <div class="col-sm-6">
                                                    @foreach ($dealers  as $dealer)
                                                        @if ($dealerbalance[0]->dealer_id == $dealer->id)
                                                        <input  type="text"  value="{{ $dealer->name }}" class="form-control"  readonly>
                                                        @endif
                                                    @endforeach
                                                    <input type="number" class="hidden" value="{{ $dealerbalance[0]->dealer_id }}" name="dealer_id" readonly>

                                                </div>
                                            </div>




                                            <label class="col-form-label mt-2 mb-1 text-center text-blue"> ( Use negative sign (" - ") before amount if it is due. )</label>
                                            <div class="form-group row">

                                                <label  class="col-sm-2 col-form-label">Balance</label>
                                                <div class="col-sm-6">
                                                <input type="number" name="balance" value="{{ $dealerbalance[0]->balance }}"  class="form-control" placeholder="Balance" required>
                                                </div>
                                            </div>






                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" name="submit2" class="btn btn-success btn-2">Update</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.dealerpayment') }}">Go Back</a>
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







