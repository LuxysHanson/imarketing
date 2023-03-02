@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Корзина') }}</h3>
                    </div>
                    <div class="card-body">

                        <div class="container padding-bottom-3x mb-1">

                            @if(!$basket->isEmpty())
                                <div class="table-responsive shopping-cart">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Название продукта</th>
                                            <th class="text-center">Количество</th>
                                            <th class="text-center">Промежуточный итог</th>
                                            <th class="text-center">
                                                <a class="btn btn-sm btn-outline-danger" href="{{ route('basket.clear') }}">
                                                    Очистить
                                                </a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($basket as $item)
                                            <tr class="{{ 'product-row-'. $item->product_id }}">
                                                <td>
                                                    <div class="product-item">
                                                        <div class="product-info">
                                                            <h4 class="product-title">
                                                                <a href="{{ route('product.show', ['slug' => $item->product->slug]) }}">
                                                                    {{ $item->product->title }}
                                                                </a>
                                                            </h4>
{{--                                                            <span><em>Size:</em> 10.5</span><span><em>Color:</em> Dark Blue</span>--}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->total_count }}
                                                </td>
                                                <td class="text-center text-lg text-medium">
                                                    {{ $item->price }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="remove-from-cart btn-remove-basket" href="javascript:void(0)"
                                                        data-id="{{ $item->product_id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <p>
                                    Итоги:
                                    <span class="text-medium basket-count">
                                        {{ array_sum(array_column($basket->toArray(), 'price')) }}
                                    </span>
                                </p>
                            @else
                                <div class="alert alert-warning">
                                    Ваша корзина пустая.
                                </div>
                            @endif

                            <div class="shopping-cart-footer">
                                <div class="column">
                                    <a class="btn btn-outline-secondary" href="/">
                                        <i class="icon-arrow-left"></i>&nbsp;Назад
                                    </a>
                                </div>
                                <div class="column">
                                    <a class="btn btn-success {{ $basket->isEmpty() ? 'disabled' : '' }}" href="#">
                                        Оформить заказ
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
