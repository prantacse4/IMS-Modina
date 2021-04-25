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
                    <div class="col">
                        <a target="_blank" href="#">
                            <h1><b>MODINA</b></h1>
                            </a>
                    </div>
                    <div class="col company-details">
                        @foreach ($sale_records as $sale)
                        @foreach ($companies as $company)
                        @if ($sale->company == $company->id )
                        <h2 class="name">
                            <a target="_blank" href="#">
                                {{ $company->com_name }}
                            </a>
                        </h2>
                        @foreach ($showrooms as $showroom)
                        @if ($sale->showroom == $showroom->id )
                        <h5 class="name">{{ $showroom->name }}</h5>
                        @endif
                        @endforeach
                        <div>{{ $company->com_address }}</div>
                        <div>{{ $company->com_phone }}</div>
                        <div>{{ $company->com_email }}</div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </header>
            <main>

                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>

                        @foreach ($sale_records as $sale)
                        @foreach ($dealers as $dealer)
                        @if ($sale->dealer == $dealer->id )
                        <h2 class="to">{{ $dealer->name }}</h2>
                        <div class="address">{{ $dealer->address }}</div>
                        <div class="email"><a href="mailto:john@example.com">{{ $dealer->phone }}</a></div>
                        @endif
                        @endforeach
                        @endforeach

                    </div>
                    <div class="col invoice-details">
                        <h3>Invoice Date</h3>
                        <div class="date">Date of Invoice: {{Carbon\Carbon::now()->format('Y-m-d')." Time: ".Carbon\Carbon::now()->format('H:i')}}</div>
                        @foreach ($sale_records as $sale)
                        <div class="date">Sale Date: {{ $sale->date }}</div>
                        @endforeach
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="text-left">Product</th>
                            <th class="text-right">Qty</th>
                            <th class="text-right">Free</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sold_products as $sold)


                        @foreach ($products as $product)
                        @if ($sold->product_id == $product->id )
                        <tr>
                            <td class="text-left"><h3>
                                <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                    {{ $sold->product_name }}
                                </a>
                                </h3>
                                Product Code: {{ $product->pro_code }}
                            </td>
                            <td class="unit">x {{ $sold->qty }} {{ $product->qty_type }}</td>
                            <td class="qty"> x {{ $sold->free }} {{ $product->qty_type }}</td>
                            <td class="total">{{ $sold->pro_sell }} TAKA</td>
                            <td class="total">{{ $sold->total }} TAKA</td>
                        </tr>

                        @endif
                        @endforeach
                        @endforeach

                    </tbody>
                    <tfoot>
                        @foreach ($sale_records as $sale)
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TOTAL</td>
                            <td>{{ $sale->total_amount }} TAKA</td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
                <hr>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Please recheck the data!</div>
                </div>
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

    <script type="text/javascript">
        window.addEventListener("load", window.print());
         window.onafterprint = function(){
             window.location.href='{{ route("admin.sale") }}';

       }
      </script>
</body>
</html>
