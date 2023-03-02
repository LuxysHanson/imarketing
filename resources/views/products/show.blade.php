@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            {{ __('Просмотр - :product_name', [
                                'product_name' => $product->title
                            ]) }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $product->description }}</p>
                        <p>Цена - {{ $product->price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
