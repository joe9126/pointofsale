@extends('layouts.app')
@section('title','Transaction Recepit')
@section('content')

 <div class="ticket">

            <img src="{{url('assets/images/receiptlogo.jpg')}}" alt="Logo"/>
            <p class="centered">RECEIPT EXAMPLE
                <br>Address line 1
                <br>Address line 2</p>
            <p class="centered">Transaction #:
                <span id="transid">
                    {{Request::get('trans_no') }}
                </span><br>
            Date:{{Carbon\Carbon::now()->format('d M Y H:m:i')}}</p>
            <table id="recepittable">
                <thead>
                    <tr>
                        <th class="description">Item</th>
                        <th class="quantity">Qty.</th>
                        <th class="price">@ Price</th>
                        <th class="price">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transdata as $data)
                     <tr>
                        <td class="description">{{$data->productname}}</td>
                        <td class="quantity">{{$data->qty_sold}}</td>
                        <td class="price">{{$data->unit_price}}</td>
                        <td class="price">{{$data->unit_price * $data->qty_sold}}</td>
                    </tr>
                    @endforeach
                 </tbody>
            </table>
            <p class="centered"> You were served by: {{Auth::user()->name}}</p>
            <p class="centered">Thanks for your purchase!</p>
        </div>



@endsection
<script type="text/javascript">
    window.print();
</script>