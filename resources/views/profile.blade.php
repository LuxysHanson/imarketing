@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Профиль - :user_name', ['user_name' => $user->name]) }}</h3>
                    </div>
                    <div class="card-body">
                        <p>Email - {{ $user->email }}</p>
                        <p>Телефон номера - {{ $user->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
