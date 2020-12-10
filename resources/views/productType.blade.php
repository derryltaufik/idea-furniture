@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" class="form-inline">
            <h1 class="mx-auto">{{$productType->name}}</h1>
            <div class="form-group mx-0">
                <input class="form-control" type="text" placeholder="Search" name="search">
                <input class="btn btn-primary" type="submit" value="Search">
            </div>
        </form>
        <hr/>
        @if(count($products) > 0)
            <div class="row justify-content-center">
                <div class="card-columns">
                    @foreach($products as $product)
                        <a href="/product/{{$product->id}}" style="text-decoration: none; color: black">
                            <div class="card text-center">
                                <img src="/storage/{{$product->image}}" class="card-img-top" alt="{{$product->name}}">

                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-subtitle text-muted" style="font-size: 8pt">{{$product->description}}</p>
                                    <h4 class="card-text">Rp. {{number_format($product->price,0,',','.')}}</h4>
                                </div>
                                @if (Auth::check())
                                    @if (Auth::user()->role == 'admin')
                                        <div class="card-footer">
                                            <div class="btn-group" role="group">
                                                <a href="/product/update/{{$product->id}}" class="btn btn-outline-success">{{ __('Update') }}</a>
                                                <form action="/product/delete/{{$product->id}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger">{{ __('Delete') }}</a>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
                {{$products->links()}}
            </div>
        @else
            <h3>No Item Found!</h3>
        @endif
    </div>
@endsection
