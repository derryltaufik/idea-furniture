@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center">Shopping Cart</h1>
        <hr/>

        @if(count($cart) > 0)
            <div class="row justify-content-center">
                <table class="table">
                    @foreach ($cart as $cartItem)
                        <tr>
                            <td>
                                <img src="/storage/{{$cartItem->product->image}}" alt="{{$cartItem->product->name}}" style="max-height: 100px">
                            </td>
                            <td class="align-middle">
                                <p class="font-weight-light">Product Name:</p>
                                <p class="font-weight-bold">{{$cartItem->product->name}}</p>
                            </td>
                            <td class="align-middle">
                                <form action="{{url()->current()}}/update/{{$cartItem->id}}" method="post" class="form-inline">
                                    @csrf
                                    <div class="form-group mx-0">
                                        <label for="quantity" class="col-form-label text-md-right font-weight-light">Quantity</label>
                                        <input id="quantity" type="text" class="form-control" name="quantity" value="{{ $cartItem->quantity }}">

                                        <input class="btn btn-primary" type="submit" value="&#10003">
                                    </div>
                                </form>
                            </td>
                            <td class="align-middle">
                                <p class="font-weight-light">Price:</p>
                                <p class="font-weight-bold">Rp. {{number_format($cartItem->product->price,0,',','.')}}</p>
                            </td>
                            <td class="align-middle">
                                <p class="font-weight-light">SubTotal:</p>
                                <p class="font-weight-bold">Rp. {{number_format($cartItem->product->price * $cartItem->quantity,0,',','.')}}</p>
                            </td>
                            <td class="align-middle">
                                <form action="{{url()->current()}}/delete/{{$cartItem->id}}" method="post">
                                    @csrf
                                    <div class="form-group mx-0">
                                        <input class="btn btn-warning" type="submit" value="X">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <h4>Grand Total: <span class="font-weight-bold" >Rp. {{number_format($grandTotal,0,',','.')}}</span></h4>
                <form action="{{url()->current()}}/checkout" class="ml-auto" method="post">
                    @csrf
                    <input type="hidden" value="{{$grandTotal}}" name="grandTotal">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Check Out">
                    </div>
                </form>
            </div>
        @else
            <h3>No Item Found!</h3>
        @endif
    </div>
@endsection
