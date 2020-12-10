@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center">Transaction History</h1>
        <hr/>

        @if(count($transactionHeaders) > 0)
            <div class="row">
                @foreach ($transactionHeaders as $header)
                    <h4>{{$header->created_at}}</h4>
                    <table class="table">
                        @foreach ($header->transactionDetails as $detail)
                            <tr>
                                <td>
                                    <img src="/storage/{{$detail->product->image}}" alt="{{$detail->product->name}}" style="max-height: 100px">
                                </td>
                                <td class="align-middle">
                                    <p class="font-weight-light">Product Name:</p>
                                    <p class="font-weight-bold">{{$detail->product->name}}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="font-weight-light">Quantity:</p>
                                    <p class="font-weight-bold">{{ $detail->quantity }}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="font-weight-light">Price:</p>
                                    <p class="font-weight-bold">Rp. {{$detail->product->price}}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="font-weight-light">SubTotal:</p>
                                    <p class="font-weight-bold">Rp. {{$detail->product->price * $detail->quantity}}</p>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <h5 style="margin-left:75%">Grand Total: <span class="font-weight-bold" >Rp. {{$header->grand_total}}</span></h5>
                    <hr/>
                @endforeach
            </div>
        @else
            <h3>No History Found!</h3>
        @endif
    </div>
@endsection
