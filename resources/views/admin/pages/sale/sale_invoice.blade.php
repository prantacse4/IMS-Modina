<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <title>Invoice</title>
</head>
<body>!
   <div class="container">
       <div class="btn btn-success pl-4 pr-4 m-4">
           <h1>Sale Records</h1>
       </div>
       <div class="card card-body">
           <hr>
           @foreach ($sale_records as $sale)
           <div class="card card-body bg-warning">
            <b><p>Date:: {{ $sale->date }}</p></b>
            <b><h3>Total Amount:: {{ $sale->total_amount }}</h3></b>
           </div>
           <br>

           <div class="mt-2 card card-body bg-primary">
            @foreach ($companies as $company)
            @if ($sale->company == $company->id )
            <h3>Company:: {{ $company->com_name }}</h3>
            <h5>Address:: {{ $company->com_address }}</h5>
            @endif
            @endforeach
           </div><br>

           <div class="card card-body text-white bg-info">
           @foreach ($dealers as $dealer)
           @if ($sale->dealer == $dealer->id )
           <h3>Name:: {{ $dealer->name }}</h3>
           <h5>Address:: {{ $dealer->address }}</h5>
           @endif
           @endforeach
           </div><br>

           <div class="card card-body text-white bg-info">
            @foreach ($showrooms as $showroom)
            @if ($sale->showroom == $showroom->id )
            <h3>Name:: {{ $showroom->name }}</h3>
            <h5>Email:: {{ $showroom->email }}</h5>
            <h5>Location:: {{ $showroom->location }}</h5>
            @endif
            @endforeach
           </div>
           <br>


           @endforeach
           <br>

           @foreach ($sold_products as $sold)
           @foreach ($products as $product)
           @if ($sold->product_id == $product->id )
           <h3 class="text-bold alert alert-primary">Name:: {{ $sold->product_name }}</h3>
           <h5>Qty:: X{{ $sold->qty }}</h5>
           <h5>Free:: X{{ $sold->free }}</h5>
           <h5>Sold:: {{ $sold->pro_sell }}</h5>
           <h5><b>Total:: {{ $sold->total }}</b></h5>
           <h5>Code:: {{ $product->pro_code }}</h5>
           <h5>Product Purchasing:: {{ $product->pro_purchasing }}</h5><br><hr>
           @endif
           @endforeach
           @endforeach

       </div>
   </div>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
         window.onafterprint = function(){
             window.location.href='{{ route("admin.sale") }}';

       }
      </script>
</body>
</html>
