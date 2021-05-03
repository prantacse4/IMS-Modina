@extends('admin.pages.payment.to_company.layouts.paymentlayout')

@section('pagename')
    Update Payment
@endsection





@section('paymentsidebar')
@include('admin.pages.payment.to_company.sidebar.paymentsidebar')
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.payment') }}">Payment</a></li>
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
                                        <form  class="form-horizontal" action="{{ route('admin.updatebalance.update',$balance[0]->id) }}" method="POST" >
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                                <x-alert></x-alert>


                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Company</label>
                                                <div class="col-sm-6">
                                                    @foreach ($companies as $company)
                                                        @if ($balance[0]->com_id == $company->id)
                                                        <input  type="text"  value="{{ $company->com_name }}" class="form-control"  readonly>
                                                        @endif
                                                    @endforeach
                                                    <input type="number" class="hidden" value="{{ $balance[0]->com_id }}" name="com_id" readonly>

                                                </div>
                                            </div>




                                            <label class="col-form-label mt-2 mb-1 text-center text-blue"> ( Use negative sign (" - ") before amount if it is due. )</label>
                                            <div class="form-group row">

                                                <label  class="col-sm-2 col-form-label">Balance</label>
                                                <div class="col-sm-6">
                                                <input type="number" name="balance" value="{{ $balance[0]->balance }}"  class="form-control" placeholder="Balance" required>
                                                </div>
                                            </div>






                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" name="submit2" class="btn btn-success btn-2">Update</button>
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







