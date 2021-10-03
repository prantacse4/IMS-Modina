@extends('admin.pages.purchase.layouts.purchaseproductlayout')

@section('pagename')
Purchase Product
@endsection


@section('extracsscdn')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('purchaseproductsidebar')
@include('admin.pages.purchase.sidebar.purchaseproductsidebar')
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
                            <li class="breadcrumb-item"><a href="#">Purchase</a></li>
                            <li class="breadcrumb-item active">Purchase Product</li>
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
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <!-- main body start from here -->


            <div class="card">
                <div class="card-header bg-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="m-0">Purchase</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('admin.purchase') }}" class="btn btn-warning text-right addbtn">
                                Records
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" card-body">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row">Sale Date</th>
                                    <td><input type="datetime-local" value="{{Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')}}" class="form-control" id="purchaseDate"  ></td>
                                </tr>

                                <!-- All Dealers through allDealers() function -->
                                <tr>
                                    <th scope="row">Company</th>
                                    <td>
                                    <input type="text" value="{{ $company[0]->com_name }}" class="form-control" readonly ></td>


                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Showroom</th>
                                    <td>
                                    <select class="form-control select2 select2-info" style="width:100%;" id="showroom" name="showroom">
                                        <option selected ="false" value="0">Select Showroom</option>
                                        @foreach ($showroom  as $showroom)
                                            <option value="{{ $showroom->id }}">{{ $showroom->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input class="form-control" type="number" readonly placeholder="Total Amount" id="upTotalAmount" value="0"> --}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div align="center">
                                <button type="submit" id="finalSubmit" class="btn btn-info">Purchase</button>
                            </div>
                        </div>
                        <div class="p-2">
                            <table class="table">
                                <tbody>


                                <!-- Validating total discount through totalDiscountValidation() function  -->

                                <tr>
                                    <th scope="row">Total Amount</th>
                                    <td>
                                    <input  class="form-control" type="number" id="totalPayment" Readonly value="0">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Balance</th>
                                    <td>
                                        <input type="number" class="d-none" id="mainBalance" value="{{ $balancedue[0]->balance }}">
                                    @if ($balanceduecount>0)
                                    @if ($balancedue[0]->balance>=0)
                                    <input  class="form-control" type="number" id="balance" Readonly value="{{ $balancedue[0]->balance }}" placeholder="Balance Amount">
                                    @else
                                    <input  class="form-control" type="number" id="balance" Readonly value="0" placeholder="Balance Amount">
                                    @endif
                                    @else
                                    <input  class="form-control" type="number" id="balance" Readonly value="0" placeholder="Balance Amount">
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Due</th>
                                    <td>
                                    @if ($balanceduecount>0)
                                        @if ($balancedue[0]->balance<0)
                                        <input  class="form-control" type="number" id="due" value="{{ $balancedue[0]->balance-$balancedue[0]->balance-$balancedue[0]->balance }}" Readonly placeholder="Due Amount">
                                        @else
                                        <input  class="form-control" type="number" id="due" value="0" Readonly placeholder="Due Amount">
                                        @endif
                                    @else
                                    <input  class="form-control" type="number" id="due" value="0" Readonly placeholder="Due Amount">
                                    @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




            </div>




        <div class="contents card">
            <div class="card-header bg-primary">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="m-0">Add Product Cart</h5>
                    </div>
                    <div class="col-md-6  text-right">
                        <input type="button" value="" id="stock" class="btn d-none  text-bold btn-danger addbtn">
                        <input type="button" value="" id="stocknotify" class="btn d-none  text-bold btn-danger addbtn">
                        <button class="btn ml-2 text-bold btn-warning addbtn">
                            {{ $company[0]->com_name }}
                        </button>
                        <input type="number" class="form-control d-none" id="com_id" placeholder="Company" value="{{ $company[0]->id }}"/>


                        <span>
                            <a href="{{  route('admin.selectpurchasecompany') }}" class="btn btn-warning addbtn ml-2">Change Company</a>
                        </span>
                    </div>
                </div>
            </div>


        <div class="card-body">
            <div class="mr-auto  table-responsive p-0 ">
                    {{-- <span id="error"></span> --}}
                    <table class="table table table-hover table-striped table-head-fixed" id="item_table">
                            <tbody>
                            <thead>
                            <tr>
                                <th>&nbsp; &nbsp;</th>
                                <th><p>Category</p></th>
                                <th><p>Products</p></th>
                                <th><p>Quantity</p></th>
                                <th><p>Free</p></th>
                                <th><p>Purchasing Price</p></th>
                                <th><p>Total Amount</p></th>
                            </tr>
                            </thead>

                                <tr>
                                <th scope="row"> </th>

                                <!-- Showing all the available categories thorugh allCategories() function -->

                                <!-- Showing all the available products of a selected category thorugh allProducts() function -->

                                <td>
                                    <div class="form-group">

                                        <select class="form-control select2 select2-info" name="category" style="width: 100%;" >
                                            <option selected ="false" value="0">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </td>
                                <td>
                                <div class="form-group">
                                    <select class="form-control select2 select2-info" name="product" id="product_name" style="width: 100%;"  >
                                        <option selected ="false" value="0">Select Product</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->pro_name }}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                                </td>

                                {{-- <td>
                                    <input type="text" class="form-control" id="pro_quantity" placeholder="Stock" readonly />
                                </td> --}}

                                <!-- Checking the validity of Quantity through quantityValidation() function -->
                                <td>
                                    <input type="number" class="form-control" id="qty" placeholder="Quantity" value="0"/>
                                </td>




                                <td>
                                    <input type="number" class="form-control" id="free" placeholder="Free" value="0"/>
                                </td>

                                <!-- Updating purchase price every time through purchasePrice() function -->
                                <!-- Checking the validity of selling price through sellingPriceValidation() function -->
                                <td>
                                    <input type="number" class="form-control" id="pro_purchasing" placeholder="Purchasing Price"/>
                                </td>

                                <!-- Setting totalAmount without any function -->
                                <td>
                                    <input readonly type="number" class="form-control" id="pro_total" placeholder="Total"/>
                                </td>

                                <!-- Adding a product -->
                                <td><button id="addProduct" class="btn btn-success">Add</button></td>
                                </tr>
                            </tbody>

                    </table>

            </div>
        </div>
        </div>





                <br>

                <div class="contents" id="mycart">
                        <div class="d-flex">
                                    <div class="mr-auto  table-responsive p-0" style="max-height: 300px;" id="addedproductdetails">
                                        <table class="table table-hover table-striped table-head-fixed" >
                                            <thead>
                                              <tr class="mytablehead">
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Free</th>
                                                <th scope="col">Purchasing Price</th>
                                                <th scope="col">Total Amount</th>
                                                <th scope="col">Delete</th>
                                              </tr>
                                            </thead>



                                            <tbody id="showtempproduct">
                                                @foreach($temptabledata as $tempproduct)
                                                <tr id="tempproductid_{{ $tempproduct->id }}">
                                                    <td>{{ $tempproduct->product_name  }}</td>
                                                    <td>{{ $tempproduct->qty }}</td>
                                                    <td>{{ $tempproduct->pro_pur }}</td>
                                                    <td>{{ $tempproduct->total }}</td>
                                                    <td colspan="2">
                                                        <a href="javascript:void(0)" id="delete_temp_product" data-id="{{ $tempproduct->id }}" class="delete_temp_product"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                          </table>



                                    </div>

                        </div>
                </div>
                <br>


                <br>



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


$(document).ready(function ()
 {
var urlHeader = "http://127.0.0.1:8000";
var stateDealerID = null;
var stateDealerMobile = null;
var stateTotalAmount = 0.0;
var stateBalance = 0.0;
var stateDue=0.0;
var statetotalPayment=0.0;
var purchaseDate = null;
var latestsavedID = 0;
var free = 0.0;
var mainBalance = 0.0;
var mycartdisplay = true;
var productselected = false;
var stock = 0.0;
var fullData = [
    {purchaseDate:purchaseDate, stateDealerID:stateDealerID, stateDealerMobile:stateDealerMobile, stateTotalAmount:stateTotalAmount, statetotalPayment:statetotalPayment  }
];


mainBalance = $('#mainBalance').val();
mainBalance=parseFloat(mainBalance);



//-------------- ADD PRODUCT TO SELL TABLE WITH VALIDATION------------//






//Initially Delete all The Table Rows
var deletestatus =false;
if(deletestatus == false){
deletestatus =true;
if (mycartdisplay==true) {
    mycartdisplay =false;
    $('#mycart').addClass('d-none');
}
$.ajax({
        url : '/admin/getTempPurchaseProduct',
        type : "GET",
        dataType : "json",
        success:function(data)
        {
        $.each(data,function (key,value) {

                var database_product_id = value.id;
                $("#tempproductid_" + database_product_id).remove();
                // Delete
                $.ajax({
                    url: urlHeader+'/api/admin/getTempPurchaseProduct/delete/'+database_product_id,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        
                    }
                });
            });
        }
    });

}


//Initially Delete all The Table Rows

//Empty Stock Table
var deletestatus2 =false;
if(deletestatus2 == false){
deletestatus2=true;
$.ajax({
        url : '/admin/getTempPStockProduct',
        type : "GET",
        dataType : "json",
        success:function(data)
        {


        $.each(data,function (key,value) {

                var database_id = value.id;
                $('#stocknotify').addClass('d-none');
                // Delete
                $.ajax({
                    url: urlHeader+'/api/admin/getTempPStockProduct/delete/'+database_id,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {

                    }
                });
            });
        }
    });

}







    var pro_name,product_id;
    var database_qty,database_pro_purchasing;
    var final_total_amount = 0.0;


     $('select[name="category"]').on('change', function(){

        var cat_id = $(this).val();


        //Getting Product From Selected Category
        if (cat_id >0) {
            $.ajax({

                url : '/admin/getPurchaseProduct/'+cat_id,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    $('select[name="product"]').empty();
                    $('select[name="product"]').append('<option value=" '+ 0 + ' ">' +"Select Product"+'</option>');
                    $.each(data,function (key,value) {
                        $('select[name="product"]').append('<option value=" '+ key + ' ">' +value+'</option>');
                    });
                }

            });
        }

        //Getting All Product If Category is not Selected
        else if(cat_id == 0){
            $.ajax({
            url : '/admin/getAllPurchaseProduct',
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                $('select[name="product"]').empty();
                $.each(data,function (key,value) {
                    $('select[name="product"]').append('<option value=" '+ key + ' ">' +value+'</option>');
                });
            }

            });

        }
        else {
            $('select[name="product"]').empty();
        }
     });


       // Getting Category  From Selected Product
     $('select[name="product"]').on('change', function(){
        var pro_id = $(this).val();
        var getcatid;
        if (pro_id>0) {
            productselected = true;

            $.ajax({

                url : '/admin/getPurchaseCategory/'+pro_id,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    // console.log(data);
                    $('select[name="category"]').empty();
                    $.each(data,function (key,value) {
                         getcatid = key;
                        var getcatname = value;
                        $('select[name="category"]').append('<option value=" '+ key + ' ">' +value+'</option>');

                    });
                }

            });

       // Getting All Category in all Time
            $.ajax({
            url : '/admin/getAllPurchaseCategory',
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                $.each(data,function (key,value) {
                   if(key!=getcatid){
                    $('select[name="category"]').append('<option value=" '+ key + ' ">' +value+'</option>');
                   }
                });
            }

            });


        } else {
            productselected = false;
            $('select[name="category"]').empty();
            $('select[name="category"]').append('<option value=" '+ 0 + ' ">' +"Select Category"+'</option>');


            //Getting All Category in all Time
            $.ajax({
            url : '/admin/getAllPurchaseCategory',
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                $.each(data,function (key,value) {
                    $('select[name="category"]').append('<option value=" '+ key + ' ">' +value+'</option>');

                });
            }

            });


        }
        });




       // Setting ProductDetails Value 0 When Product is not Selected
        $('select[name="category"]').on('change', function(){
        $('#pro_quantity').val("0");
        $('#pro_purchasing').val("0");
        $('#pro_total').val("0");
        productselected = false;



        });

        //Setting ProductDetails Value After selecting Product
        $('select[name="product"]').on('change', function(){

        $('#pro_total').val("0");
        $('#pro_purchasing').val("0");
        $('#qty').val("0");
        $('#stock').val("0");
        stock = $('#stock').val();
        $('#stocknotify').val("Stock: "+stock);
        $('#stocknotify').removeClass('d-none');
        $('#free').val("0");




        var pro_id = $(this).val();
        var pro_stock_id = 0;
        if(pro_id>0){
            productselected = true;
            $.ajax({
            url : '/admin/getAllPurchaseProductDetails/'+pro_id,
            type : "GET",
            dataType : "json",
            success:function(data)
            {


                pro_quantity = data[0].pro_quantity;
                pro_purchasing = data[0].pro_purchasing;
                pro_name = data[0].pro_name;
                product_id = data[0].id;
                database_qty = pro_quantity;
                stock = pro_quantity;
                $('#stock').val(stock);
                $('#stocknotify').val("Stock: "+stock);
                $('#pro_purchasing').val(pro_purchasing);



                //Setting Total Value by taking Qty input
                $('#qty').on( 'input',function(){
                    var qty = $('#qty').val();
                    var purPrice = $('#pro_purchasing').val();
                    var total = qty*purPrice;
                    $('#pro_total').val(total);

                });

                //Setting Total Value by taking Purchasing Price input
                $('#pro_purchasing').on( 'input',function(){
                    var qty = $('#qty').val();
                    var purPrice = $('#pro_purchasing').val();
                    var total = qty*purPrice;
                    $('#pro_total').val(total);

                });



            //getting data from stock table
            //setting
            $.ajax({
            type: "GET",
            url : '/admin/getTempPStockProduct',
            dataType: "json",
            success: function (data) {
                $.each(data,function (key,value) {
                    if (value.product_id == pro_id) {
                        stock = value.stock;
                        $('#stock').val(stock);
                        $('#stocknotify').val("Stock: "+stock);
                    }

                });
                // stock = data[0].stock;

            }
             });





            }

            });



            //Checking Added Stock In Live Operation and Fixed The Stock Value
            // var stock = 0;
            // $.ajax({
            //     type: "GET",
            //     url: "/admin/getproductstock/"+pro_id,
            //     dataType: "json",
            //     success: function (data) {
            //         $.each(data,function (key,value) {
            //             stock = stock+value.added_qty;
            //         });

            //         alert(stock);
            //     }
            // });





        }
        else{
            productselected = false;
        }



        });



        //Before Adding Validation
                var can_add = true;

                //Input Qty Validation
                $('#qty').on('input',function(){
                var stockvalue = $('#stock').val();
                free = $('#free').val();
                var qty = $('#qty').val();
                free = parseFloat(free);
                qty = parseFloat(qty);
                stockvalue = parseFloat(stockvalue);
                    if(stockvalue<0){
                        can_add = false;
                        $('#qty').addClass("danger_input");
                        $('#free').addClass("danger_input");
                    }
                    else{
                        can_add = true;
                        $('#qty').removeClass("danger_input");
                        $('#free').removeClass("danger_input");


                    }
                });

                $('#free').on('input', function(){
                    free = $('#free').val();
                    var qty = $('#qty').val();
                    var stockvalue = $('#stock').val();
                    free = parseFloat(free);
                    qty = parseFloat(qty);
                    stockvalue = parseFloat(stockvalue);

                    if(stockvalue<qty+free){
                        can_add = false;
                        $('#qty').addClass("danger_input");
                        $('#free').addClass("danger_input");
                    }
                    else{
                        can_add = true;
                        $('#qty').removeClass("danger_input");
                        $('#free').removeClass("danger_input");

                    }


                });

                //Input Selling Price Validation
                $('#pro_purchasing').on('input',function(){
                var pro_purchasing = $('#pro_purchasing').val();
                    if(database_pro_purchasing>pro_purchasing){
                        can_add = false;
                        $('#pro_purchasing').addClass("danger_input");
                    }
                    else{
                        can_add = true;
                        $('#pro_purchasing').removeClass("danger_input");

                    }
                });




    //Adding SaleProduct By Clicking Add Button
    $('#addProduct').on('click',function(){
        var product_id = $('select[name="product"]').val();
        var qty = $('#qty').val();
        qty = parseFloat(qty);
        var total = $('#pro_total').val();
        var free= $('#free').val();
        free = parseFloat(free);
        var pro_pur =$('#pro_purchasing').val();
        var product_name = pro_name;
        var selected_product_id =product_id;
        var database_product_id = 0;
        var status = 0;








                    // Checking Select Product is Available on Database or Not
                //     $.ajax({
                //                         url : '/admin/getTempSaleProduct',
                //                         type : "GET",
                //                         dataType : "json",
                //                         success:function(data)
                //                         {
                //                             $.each(data,function (key,value) {
                //                                 database_product_id = value.product_id;
                //                                 if(database_product_id == selected_product_id){
                //                                     status = 1;
                //                                 }

                //                                 });






                //                         console.log(status);



                // }});
             // Checking Complete Selected Product is Available on Database or Not





    if(product_id>0 && qty>0 && can_add==true){

        if (mycartdisplay==false) {
            mycartdisplay=true;
            $('#mycart').removeClass('d-none');
        }
        var totalPayment = 0.0;
        totalPayment = $('#totalPayment').val(totalPayment);
        $('#totalPayment').addClass("payablesuccess");
        $('#payment').val("0");


        var addedTotal = parseFloat(total);
        mainBalance = mainBalance-addedTotal;


        if (mainBalance>=0) {
            $('#balance').val(mainBalance);
            $('#due').val(0);

        }
        else{
            $('#due').val((mainBalance)*(-1));
            $('#balance').val(0);

        }

 

        // Saving Data
        $.ajax({
                    url : urlHeader+'/api/admin/postPurchaseProductDetails/save',
                    type : "POST",
                    data : {
                        product_id : product_id,
                        qty : qty,
                        free : free,
                        total : total,
                        pro_pur : pro_pur,
                        product_name : product_name
                    },

                    success:function(data)
                    {
                        var parsedouble = parseFloat(total);
                        final_total_amount = final_total_amount + parsedouble;
                        stateTotalAmount = final_total_amount;
                        statetotalPayment = final_total_amount;
                        $('#totalPayment').val(final_total_amount);
                        var mainid = data.id;
                        var user = '<tr id="tempproductid_' +mainid + '">';
                        user += '<td>'+ product_name+'</td>';
                        user+= '<td>' +qty + '</td>';
                        user+= '<td>' +free + '</td>';
                        user+= '<td>' +pro_pur + '</td>';
                        user+='<td id="totalid_' +mainid + '" >' +total+'</td>';
                        user += '<td><a href="javascript:void(0)" id="delete_temp_product" data-id="' + mainid + '" ';
                        user += 'class="delete_temp_product ml-1"><i class="far fa-trash-alt"></i></a></td>';
                        user+='</tr>';
                        $('#showtempproduct').prepend(user);





                    }

            });



            ///Update Stock value of That Product
            var stock  = $('#stock').val();
            stock = parseFloat(stock);
            var currentstock = stock + (qty+free);
            $('#stock').val(currentstock);
            $('#stocknotify').val("Stock: "+currentstock);
            product_id = product_id;
            $.ajax({
                    type: "POST",
                    url: urlHeader+"/api/admin/saveorupdate/Pstock",
                    data:{
                        product_id: product_id,
                        stock:currentstock
                    },
                    dataType: "json",
                    success: function (response) {
                    }
                });









   }
// Saving Data



});



//Delete Row from Temp table


    //delete user login
    $('#showtempproduct').on('click', '.delete_temp_product', function () {
        var temproid = $(this).data("id");
        var totalid = '#totalid_'+temproid;
        var totalidvalue = 0.0;
        var get_f_total_amount_del = 0.0;
        var totalidvalue = $(''+totalid+'').text();
        totalidvalue = parseFloat(totalidvalue);
        get_f_total_amount_del = $('#totalPayment').val();
        final_total_amount = get_f_total_amount_del - totalidvalue;
        statetotalPayment = final_total_amount;
        stateTotalAmount = final_total_amount;
        statePayment = 0.0;
        $('#totalPayment').val(final_total_amount);

 

        let pro_id = 0;
        var added_qty = 0.0;
        var added_free = 0.0;
        var total_added_qty = 0.0;
        var getting_stock = 0.0;
        var stock_id = 0;
        var new_stock = 0.0;













        if(confirm("Are You sure want to delete !")) {





        //Getting Product Id From This Table
        $.ajax({
            url: urlHeader+"/admin/getTempPurProductID/"+temproid,
            type: "GET",
            dataType: "json",
            success: function (data) {
                pro_id = data[0].product_id;
                added_qty = data[0].qty;
                added_free = data[0].free;
                total_added_qty = added_qty+added_free;


                //Getting Stock Value of That Product Id
                $.ajax({
                    type: "GET",
                    url: urlHeader+"/admin/getPStockfromStockTemp/"+pro_id,
                    dataType: "json",
                    success: function (data) {
                        getting_stock = data[0].stock;
                        stock_id = data[0].id;
                        new_stock = getting_stock-total_added_qty;

                        //Update Stock Value of That Product
                        $.ajax({
                            type: "POST",
                            url: urlHeader+"/api/admin/updatePStockAfterDelete",
                            data: {
                                product_id:pro_id,
                                stock: new_stock,
                                stock_id:stock_id
                            },
                            dataType: "json",
                            success: function (response) {
                                $('#stock').val(new_stock);
                                $('#stocknotify').val("Stock: "+new_stock);
                            }

                        });

                    }
                });


            }
        });



            var removedTotal = parseFloat(totalidvalue);
            mainBalance = mainBalance+removedTotal;
            if (mainBalance>=0) {
                $('#balance').val(mainBalance);
                $('#due').val(0);
            }
            else{
                $('#due').val((mainBalance)*(-1));
                $('#balance').val(0);

            }


            

        $.ajax({
            type: "DELETE",
            url: urlHeader+'/api/admin/deleteTempPurchaseProduct/delete/'+temproid,
            success: function (data) {
                $("#tempproductid_" + temproid).remove();
                var totalDiscount = 0.0;


            },
            error: function (data) {
                console.log('Error:', data);
            }
        });


    }
    });





//-------------- COMPLETED ADD PRODUCT TO SELL TABLE WITH VALIDATION------------//




// $("#purchaseDate").val(new Date().toDateString());




var saveDatabase = [{}];
$.ajax({
        url: urlHeader+"/admin/getLatestSavedIDPurchase",
        type: "GET",
        dataType: "json",
        success: function (data) {
            if (data) {
                latestsavedID = parseInt(data.id);
            }
            latestsavedID =latestsavedID+1;
        }
    });


purchaseDate = $('#purchaseDate').val();


var dealer_id;
$('select[name="dealers"]').on('change', function(){
    dealer_id = $(this).val();
 });


var showroom_id;
$('select[name="showroom"]').on('change', function(){
    showroom_id = $(this).val();
});


var data=false;
$("#finalSubmit").attr("disabled", false);

var total_Payment = $('#totalPayment').val();
total_Payment = parseFloat(total_Payment);

var com_id = $('#com_id').val();
com_id = parseInt(com_id);

$('#finalSubmit').on('click', function(){

    var total_Payment = $('#totalPayment').val();
    total_Payment = parseFloat(total_Payment);


    if (purchaseDate!= null && com_id>0 && showroom_id>0 && total_Payment>0) {
        data=true;
    }

    if (data==false) {
        alert("Can Not Submit Data");
    }
    else {
        var save_fullData = {date:purchaseDate, company:com_id, showroom:showroom_id, total_amount:total_Payment };
    // Saving Data
    
        $.ajax({
            url : urlHeader+'/api/admin/savePurchaseRecords/save',
            type : "POST",
            async: false,
            data : save_fullData,
            success:function(data)
            {
            }

            });





    //Getting Sold Product Data
    $.ajax({
        url : urlHeader+'/admin/getTempPurchaseProduct',
        type: "GET",
        dataType : "json",
        async: false,
        success: function (data) {
            $.each(data,function (key,value) {
                    var product_id = value.product_id;
                    var product_name = value.product_name;
                    var qty = value.qty;
                    var free = value.free;
                    var pro_pur = value.pro_pur;
                    var total = value.total;


                    // Save Data to New Table
                    $.ajax({
                        url: urlHeader+"/api/admin/savePurchaseddata/save",
                        type: "POST",
                        dataType: "json",
                        data:{
                            product_id:product_id,
                            purchase_id:latestsavedID,
                            product_name:product_name,
                            qty:qty,
                            free:free,
                            pro_pur:pro_pur,
                            total:total,
                        },
                        success: function (response) {
                            alert('Thanks For Purchasing!');
                            window.location.replace(urlHeader+"/admin/purchase");


                        }
                    });













                });


        }
    });
}




});










    });
        </script>

        @endsection
