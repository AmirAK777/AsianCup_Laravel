@extends('layouts.app')

@section('title', 'EasyTrip | Tiket Saya')

@section('content')
<div class="container min-vh-100">
    <div class="display-6 playfair fw-bold text-center mb-3">Tiket Anda</div>
    <div class="row ">
        @if($billets->count() > 0)
            @foreach ($billets as $billet)
                <div class="col-md-6 mb-5">
                    @include('components.billet-card',array(
                        'billet' => $billet,
                        'match' => $billet->match
                    ))
                </div>
            @endforeach
        @else
            <p class="text-muted text-center fs-5">Belum ada tiket yang dipesan.</p>
        @endif
    </div>
</div>
@endsection
