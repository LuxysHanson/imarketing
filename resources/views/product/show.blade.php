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

                        @if($product->fields)
                            <h5>Дополнительные характеристики</h5>
                            <table>
                                <tbody>
                                <tr>
                                    <td>Ширина: </td>
                                    <td>{{ $product->fields->width }}</td>
                                </tr>
                                <tr>
                                    <td>Высота: </td>
                                    <td>{{ $product->fields->height }}</td>
                                </tr>
                                <tr>
                                    <td>Вес: </td>
                                    <td>{{ $product->fields->weight }}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
