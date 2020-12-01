@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center">{{ __('Product Types') }}</h1>
        <hr/>

        <div class="row justify-content-center">
            <div class="card-columns">
                @foreach($productTypes as $productType)
                    <a href="/productType/{{$productType->id}}" style="text-decoration: none; color: black">
                        <div class="card text-center">
                            <img src="/storage/{{$productType->image}}" class="card-img-top" alt="{{$productType->name}}">

                            <div class="card-body">
                                <h5 class="card-title">{{$productType->name}}</h5>
                            </div>
                            @if (Auth::check())
                                @if (Auth::user()->role == 'admin')
                                    <div class="card-footer">
                                        <div class="btn-group" role="group">
                                            <a href="/productType/update/{{$productType->id}}" class="btn btn-outline-success">{{ __('Update') }}</a>
                                            <form action="productType/delete/{{$productType->id}}" method="post">
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
        </div>
    </div>
@endsection
