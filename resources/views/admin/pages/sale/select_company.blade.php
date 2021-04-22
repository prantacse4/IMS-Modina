@extends('admin.pages.sale.layouts.salelayout')

@section('pagename')
    Sale
@endsection


@section('extracsscdn')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection



@section('salesidebar')
@include('admin.pages.sale.sidebar.saleproductsidebar')
@endsection


@section('admincontent')





        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Sale</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sale</li>
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
            <section class="content ">
            <div class="">
                <div class="card ">
                    <div class="card-header bg-primary">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ptitle">
                                <h3>Please Select Company</h3>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.sale') }}" class="btn btn-warning text-right addbtn">
                                    <span><b>Go Back</b></span>
                                </a>
                            </div>
                    </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        {{-- <form id="myform"  class="form-horizontal" action="{{ route('admin.saleprocess.process') }}" method="POST">
                            @csrf --}}

                        <div class="form-group row text-center">
                            <label class="col-md-4 col-sm-12 col-form-label">Select Company</label>

                            <div class="col-md-5 col-sm-12">
                                <div class="form-group">
                                    <select class="form-control select2 select2-info"
                                    data-dropdown-css-class="select2-info" id="com_id" style="width: 100%;" name="com_id" required>
                                    <option value="" selected>Select Company</option>
                                    @foreach ($company as $company)
                                    <option value="{{ $company->id }}">{{ $company->com_name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3">
                            <button id="myform" class="btn btn-primary pl-3 pr-3"><b>Submit</b></button>

                            </div>

                        </div>






                        <div class="col-md-12 col-sm-12 text-center">
                        </div>

                        {{-- </form> --}}

                        <br><br>












                    </div>
                    <!-- /.card-body -->
                </div>
            </div>


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

<script>
$(document).ready(function () {
 var cat_id = null;
 var com_id = null;
 var urlHeader = "http://127.0.0.1:8000";


var deletestatus =false;
if(deletestatus == false){
deletestatus =true;
$.ajax({
        url : '/admin/gettemp/salecondition',
        type : "GET",
        dataType : "json",
        success:function(data)
        {
        $.each(data,function (key,value) {

                var database_product_id = value.id;
                // Delete
                $.ajax({
                    url: urlHeader+'/api/admin/salecondition/delete/'+database_product_id,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {

                    }
                });
            });
        }
    });

}



//Save Form Data
$("#myform").on("click", function(){

$.ajax({
        url : '/admin/gettemp/salecondition',
        type : "GET",
        dataType : "json",
        success:function(data)
        {
        $.each(data,function (key,value) {

                var database_id = value.id;
                // Delete
                $.ajax({
                    url: urlHeader+'/api/admin/salecondition/delete/'+database_id,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        deletestatus =true;


                    }
                });
            });
        }
    });







    com_id = $("#com_id").val();
    $.ajax({
        type: "POST",
        url: urlHeader+"/api/post/sale/condition",
        data:{
            com_id:com_id
        },
        success: function (response) {
                var url = "{{ route('admin.saleproduct') }}";
                window.location.href=url;
        }
    });
})


});

</script>

        @endsection
