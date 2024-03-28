@foreach($billetsEnVente as $billet)
    <div>
        <p>ID du billet: {{ $billet->billet_id }}</p>
        <form action="{{ route('billet.buy', ['id' => $billet->billet_id]) }}" method="POST">
            @csrf
            <button type="submit">Acheter le billet</button>
        </form>
    </div>
@endforeach
