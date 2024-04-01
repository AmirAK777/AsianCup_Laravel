@foreach($billetsEnVente as $billet)
<div>
    <p>ID du billet: {{ $billet->billet_id }}</p>
    <form action="{{ route('cartBillet.create') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="quantity" value="{{ $match->quantity }}">
        <input type="hidden" name="billet_id" value="{{ $billet->billet_id }}">
        <input type="hidden" name="billet_date" value="{{ $billet->billet_date }}">
        <button type="submit">Acheter le billet</button>
    </form>
</div>
@endforeach