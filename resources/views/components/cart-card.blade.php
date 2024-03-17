<div class="card shadow-sm mb-3">
    <div class="row g-0">
        <div class="col-8">
            <div class="card-body d-flex flex-column h-100">
                <div class="card-title">
                    <span class="fs-5 fw-semibold">{{$match->name}}</span>
                    <span class="text-muted">| {{$command->quantity}} Personnes</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="card-text fw-semibold mb-0">EURO {{number_format($command->total_price,0,',','.')}}</p>
                    <div class="d-flex align-items-center gap-2">
                        <a class="btn btn-warning" href="{{route('cart.form', ['id' => $command->id])}}"><i class="bi bi-pencil-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
