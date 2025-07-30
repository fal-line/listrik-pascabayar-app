@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat datang di Portal PLN</div>

                <div class="card-body row justify-content-center">
                    
                    Mohon untuk melakukan login terlebih dahulu untuk mengakses informasi layanan.

                    @if (Route::has('login'))
                    <br>
                    <br>
                            <a class="nav-link" href="{{ route('login') }}"> <h2 class="row justify-content-center">{{ __('Login') }}</h2></a>
                    <br>
                    <br>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
