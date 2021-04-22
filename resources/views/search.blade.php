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

                    <div class="form-group fgroups1 ">
                        <select class="form-control select2 select2-info" name="category" id="category" data-dropdown-css-class="select2-info" style="width: 100%;">
                            <option selected ="false">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group fgroups2">
                        <select class="form-control select2 select2-info" name="product" id="product" data-dropdown-css-class="select2-info" style="width: 100%;">
                            {{-- <option selected ="false">Search Here</option> --}}
                            <option selected ="false">Select Product</option>
                                                        @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->pro_name }}</option>
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


                @foreach($products as $product)
            <div class="col-md-6 mt-3">
                <div class="card card-body">
                    <div class="name">
                        <h5>{{$product->pro_name}}</h5>
                    </div>
                    <div class="cardcontent">
                        <p>Code : {{$product->pro_code}}</p>
                        <p>Name : {{$product->pro_name}}</p>
                    </div>
                </div>
            </div>
            @endforeach



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






     $('select[name="product"]').on('change', function(){

var pro_id = $(this).val();
if (pro_id) {
    $.ajax({

        url : '/admin/getSaleCategory/'+pro_id,
        type : "GET",
        dataType : "json",
        success:function(data)
        {
            console.log(data);
            $('select[name="category"]').empty();
            $.each(data,function (key,value) {
                $('select[name="category"]').append('<option value=" '+ key + ' ">' +value+'</option>');
            });
        }

    });
} else {
    $('select[name="category"]').empty();
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
