@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="background-color:yellow">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/storage/{{$product->image}}" class="card-img" alt="{{$product->image}}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card" style="background-color: rgb(246, 255, 118)">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-subtitle text-muted" style="font-size: 8pt">{{$product->description}}</p>
                                <h4 class="card-text">Rp{{$product->price}}</h4>
                                <p class="card-title" style="font-size: 12pt">Stock: {{$product->stock}}</p>
                                
                                @if (Auth::user()->role == 'member')
                                    <hr/>
                                    <form action="" method="post" class="form-inline">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required autofocus>
                
                                                @error('quantity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row ml-5">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add to Cart') }}
                                            </button>
                                        </div>
                                    </form>
                                    
                                    @if (session('success'))
                                        <article class="text-success">
                                            {{session('success')}}
                                        </article>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection