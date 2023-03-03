@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Каталог товаров') }}</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($products)
                        <div class="row product-list">
                            @foreach($products as $product)
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->title }}</h5>
                                            <p>{{ $product->category->title }}</p>
                                            <p class="card-text">{{ $product->shortDescription() }}</p>
                                            <p>Цена - {{ $product->price }}</p>
                                            <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="btn btn-primary mb-2">
                                                {{ __('Посмотреть продукт') }}
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-add-basket {{ $product->hasCart ? 'disabled' : '' }}" style="cursor: pointer"
                                               data-id="{{ $product->id }}" data-price="{{ $product->price }}">
                                                {{ __('Добавить в корзину') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{ $products->links() }}
                    @else
                        <div class="alert alert-warning">
                            {{ __('Товары отсутвуют') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
