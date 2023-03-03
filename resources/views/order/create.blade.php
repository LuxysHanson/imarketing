@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Оформление заказа') }}</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('order.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="delivery_type" class="col-md-4 col-form-label text-md-end">{{ __('Тип доставки') }}</label>

                                <div class="col-md-6">
                                    <select id="delivery_type" name="delivery_type" class="form-select @error('delivery_type') is-invalid @enderror">
                                        @foreach(\App\Components\Enums\DeliveryTypeEnum::getLabels() as $key => $value)
                                            <option value="{{ $key }}" {{ $value == old('delivery_type') ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('delivery_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ $user ? $user->email : old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Телефон номера') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ $user ? $user->phone : old('phone') }}" required autocomplete="current-phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Адрес проживания') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" required autocomplete="current-address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Оформить') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
