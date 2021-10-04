<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('backend_assets/css/invoice.css')}}">
    <title>Invoice</title>
</head>
<body>

<div id="invoice">

    <div class="toolbar hidden-print">
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col invheader">
                            <h1>MODINA</h1>
                    </div>
                    <div class="col company-details">
                        @foreach ($sale_records as $sale)
                        @foreach ($companies as $company)
                        @if ($sale->company == $company->id )
                        <h4 class="name">
                                {{ $company->com_name }}
                        </h4>

                        <div class="com_details">
                            @foreach ($showrooms as $showroom)
                            @if ($sale->showroom == $showroom->id )
                            <p class="showromm_name">{{ $showroom->name }} Showroom</p>
                            @endif
                            @endforeach
                            <p>{{ $company->com_address }}</p>
                            <p>{{ $company->com_phone }}</p>
                            <p>{{ $company->com_email }}</p>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </header>
            <main>

                <div class="row contacts">
                    <div class="col-6 invoice-to text-left">
                        <div class="text-gray-light"><h5>INVOICE TO:</h5></div>

                        @foreach ($sale_records as $sale)
                        @foreach ($dealers as $dealer)
                        @if ($sale->dealer == $dealer->id )
                        <h6 class="dealer_name">Dealer: {{ $dealer->name }}</h6>
                        <div class="invoice_to">
                            <p>Address: {{ $dealer->address }}</p>
                            <p>Phone: {{ $dealer->phone }}</p>
                            @foreach ($companies as $company)
                            @if ($sale->company == $company->id )
                            <p>Company: {{ $company->com_name }}</p>
                            @endif
                            @endforeach
                        </div>
                        
                        
                        @endif
                        @endforeach
                        @endforeach

                    </div>
                    <div class="col-6 invoice-details text-right">
                        <div class="text-gray-light"><h5>INVOICE DATE</h5></div>
                        <div class="date">Date of Invoice: {{Carbon\Carbon::now()->format('Y-m-d')." Time: ".Carbon\Carbon::now()->format('H:i')}}</div>
                        @foreach ($sale_records as $sale)
                        <div class="date">Sale Date: {{ $sale->date }}</div>
                        @endforeach
                    </div>
                </div>

              

                <table  border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="text-left">Product</th>
                            <th>Qty</th>
                            <th>Free</th>
                            <th>Price</th>
                            <th>Free Amount</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sold_products as $sold)


                        @foreach ($products as $product)
                        @if ($sold->product_id == $product->id )
                        <tr>
                            <td class="theader">
                                    {{ $sold->product_name }}
                            </td>
                            <td>{{ $sold->qty }} {{ $product->qty_type }}</td>
                            <td>{{ $sold->free }} {{ $product->qty_type }}</td>
                            <td>{{ $sold->pro_sell }} TAKA</td>
                            <td>{{ $sold->free*$sold->pro_sell }} Taka</td>
                            <td class="total">{{ $sold->total }} Taka</td>
                        </tr>

                        

                        @endif
                        @endforeach
                        @endforeach

                    </tbody>
                    <tfoot>
                        @foreach ($sale_records as $sale)
                            <tr>
                                <td colspan="4"></td>
                                <td colspan="1"><b>TOTAL</b></td>
                                <td><b>{{ $sale->total_amount }} TAKA</b></td>
                            </tr>
                        @endforeach
                    </tfoot>
                    
                </table>
                
            </main>
            <footer>
                Greetings from Modina
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

   {{-- <div class="container">
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
   </div> --}}

    {{-- <script type="text/javascript">
        window.addEventListener("load", window.print());
         window.onafterprint = function(){
             window.location.href='{{ route("admin.sale") }}';

       }
      </script> --}}
</body>
</html>
