<form action="{{ route('billet.sell', ['id' => $billet->billet_id]) }}" method="POST">
    @csrf
    <button type="submit">Vendre le billet</button>
</form>
