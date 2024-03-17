<div class="card shadow-sm mb-3">
    <div class="row g-0">
      <div class="col-8">
        <div class="card-body d-flex flex-column h-100">
            <div class="card-title">
                <span class="fs-5 fw-semibold">{{$match->name}}</span>
                <span class="text-muted">| {{$billet->quantity}} Orang</span>
            </div>
            <p class="card-text flex-grow-1">{{ \Carbon\Carbon::parse($billet->billet_date)->format('j F Y') }}</p>
            <div class="d-flex justify-content-between align-matchs-center">
                <p>Status: <span class="@if($billet->status)text-success @else text-danger @endif">{{$billet->status?"Aktif":"Sudah Digunakan"}}</span></p>
                <a class="btn btn-primary fw-semibold text-white" href="{{route('billet.download', ['id' => $billet->billet_id])}}"><i class="bi bi-download me-2"></i>Unduh Tiket</a>
            </div>
        </div>
      </div>
    </div>
</div>
