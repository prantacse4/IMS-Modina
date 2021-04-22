<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('js/app.js') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="{{ asset('css/search.css')}}">

<title>Search</title>

</head>
<body>
    <section class="search">


        <div class="searchcontent">
            <div class="container">



                    <form action="{{ route('searchresult') }}" method="POST" role="search">
                        @csrf
                        <div class="dependendsearch">
                                    <div class="form-group fgroups1">
                                        <select class="form-control select2 select2-info" name="category" id="category" data-dropdown-css-class="select2-info" style="width: 100%;">
                                        @foreach ($categoriesall as $categoryall)
                                            @if ($categoryall->id  == $cat_id)
                                                <option selected value="{{ $categoryall->id }}">{{ $categoryall->cat_name }}</option>
                                            @else
                                                <option value="{{ $categoryall->id }}">{{ $categoryall->cat_name }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group fgroups2">
                                        <select class="form-control select2 select2-info" name="product" id="product" data-dropdown-css-class="select2-info" style="width: 100%;">
                                            @foreach ($productsall as $productall)
                                            @if ($productall->id == $pro_id)
                                                <option selected value="{{ $productall->id }}">{{ $productall->pro_name }}</option>
                                            @else
                                                <option  value="{{ $productall->id }}">{{ $productall->pro_name }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>


                                    <div class="fgroupsbtn">
                                        <button class=" btn btn-success">Search</button>
                                    </div>
                        </div>


                    </form>

                    <div class="ourcontent">
                        <div class="profile">
                            <div class="row">

                                @if($products)
                                @foreach($products as $product)
                                <div class="col-md-12 mt-3">
                                    <div class="card card-body cardcolor">
                                        <div class="cardinside">

                                            <div class="leftside">

                                                <div class="producticon">
                                                    <span class="fab fa-laravel"></span>
                                                </div>
                                                <div class="productname">
                                                    <h5>{{$product->pro_name}}</h5>
                                                </div>
                                            </div>

                                            <div class="rightside">
                                                <div class="proheader">
                                                    <h5>{{$product->pro_name}}</h5><hr>
                                                </div>
                                                <div class="prodetails">
                                                <p>Product Code : {{ $product->pro_code }}</p>
                                                    @foreach ($companies as $company)
                                                        @if ($company->id == $product->com_id)
                                                              <p>Company : {{ $company->com_name }} </p>
                                                        @endif
                                                    @endforeach

                                                    @foreach ($categoriesall as $category)
                                                        @if ($category->id == $product->cat_id)
                                                            <p>Category : {{ $category->cat_name }} </p>
                                                        @endif
                                                    @endforeach

                                                    <p>Quantity : {{ $product->pro_quantity }}</p>
                                                    <p>MRP Price : {{ $product->pro_mrp }}</p>
                                                    <p>Wholesale Price : {{ $product->pro_wholesale }}</p>
                                                    <hr>
                                                    <p>{{ $product->pro_description }}</p>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                @endforeach

                                @else
                                <div class="col-md-12 mt-3">
                                    <div class="card card-body">
                                        <h5>No results found.</h5>
                                    </div>
                                </div>

                                @endif






                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>
</body>
</html>






<script>


$(document).ready(function ()
 {
     $('select[name="category"]').on('change', function(){

        var cat_id = $(this).val();
        if (cat_id) {
            $.ajax({

                url : '/getProducts/'+cat_id,
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
        } else {
            $('select[name="product"]').empty();
        }
     });
  });

</script>




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
