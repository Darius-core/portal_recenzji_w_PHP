<section aria-label="Dodaj recenzję">
<h2>Dodaj recenzję</h2>

<form method="POST" action="{{ route('reviews.store',$movie) }}">
@csrf

<label>
Ocena (1–10)
<input type="number" name="rating" min="1" max="10" required>
</label>

<label>
Treść recenzji
<textarea name="content" rows="4" required></textarea>
</label>

<button>Dodaj</button>
</form>
</section>