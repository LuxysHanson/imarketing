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

                                        <?php $total = [] ?>
                                        @foreach($basket as $item)
                                            <tr class="{{ 'product-row-'. $item->product_id }}">
                                                <td>
                                                    <div class="product-item">
                                                        <?php
                                                        /** @var \App\Models\Basket $item */
                                                        $product = $item->product;
                                                        ?>
                                                        <div class="product-info">
                                                            <h4 class="product-title">
                                                                <a href="{{ route('product.show', $product) }}">
                                                                    {{ $product->title }}
                                                                </a>
                                                            </h4>

                                                            @if($product->fields)
                                                                <span>
                                                                <em>Вес:</em> {{ $product->fields->weight }}
                                                                </span>
                                                                    <span>
                                                                    <em>Цвет:</em> {{ $product->fields->color }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->quantity }}
                                                </td>
                                                <td class="text-center text-lg text-medium">
                                                    <?php
                                                    $sub_total = $item->price * $item->quantity;
                                                    $total[] = $sub_total;
                                                    ?>
                                                    {{ $sub_total  }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="remove-from-cart btn-remove-basket" href="javascript:void(0)"
                                                        data-id="{{ $item->id }}">
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
                                        {{ array_sum($total) }}
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
                                    <a class="btn btn-success {{ $basket->isEmpty() ? 'disabled' : '' }}"
                                       href="{{ route('order.create') }}">
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
