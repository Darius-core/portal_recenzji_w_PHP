<section aria-labelledby="add-review">
<h2 id="add-review">Dodaj recenzję</h2>

<form method="POST" action="{{ route('reviews.store',$movie) }}">
@csrf

<label for="rating">
Ocena (od 1 do 10)
</label>
<input
    id="rating"
    type="number"
    name="rating"
    min="1"
    max="10"
    required
>

<label for="content">
Treść recenzji
</label>
<textarea
    id="content"
    name="content"
    rows="4"
    required
></textarea>

<button type="submit">
Dodaj recenzję
</button>
</form>
</section>