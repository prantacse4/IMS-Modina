@extends('admin.pages.salary.layouts.salarylayout')

@section('pagename')
    Salary
@endsection

@section('extracsscdn')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('salarysidebar')
@include('admin.pages.salary.sidebar.addsalarysidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Salary</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.salary') }}">Salary</a></li>
                                <li class="breadcrumb-item active">Add Salary</li>
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
                                            <h3 class="card-title">Salary Information</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->


                                    <form  class="form-horizontal" action="{{ route('admin.addsalary.store') }}" method="POST">
                                        @csrf
                                            <div class="card-body">
                                                <x-alert></x-alert>

                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Employee ID</label>
                                                <div class="col-sm-6">
                                                <select class="form-control select2 select2-info" id="employeeid" name="employeeid" style="width: 100%;" >
                                                    <option selected ="false" value="0">Select Employee</option>
                                                    @foreach ($employees as $employee)
                                                    <option value="{{ $employee->employeeid }}">{{ $employee->name }} ({{$employee->employeeid}})</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label f class="col-sm-2 col-form-label">Amount</label>
                                                <div class="col-sm-6">
                                                <input type="number" id="salary" name="amount" class="form-control" placeholder="Salary in Number" required>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-4">
                                                <button type="submit" class="btn btn-success btn-2">Submit</button>
                                                <button type="reset" class="btn btn-danger btn-2">Reset</button>
                                                <a class="btn btn-info " href="{{ route('admin.salary') }}">Go Back</a>
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



<script>

var urlHeader = "http://127.0.0.1:8000";
var salary = 0;

$('select[name="employeeid"]').on('change', function(){

    var employeeid = $(this).val();
    if(employeeid != '' && employeeid != null && employeeid!= '0' && employeeid != 0){
         $.ajax({

                url : '/admin/getSalary/'+employeeid,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    $('#salary').val(data[0].salary);
                    
                }

            });
    }
});


</script>




@endsection



