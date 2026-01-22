<section aria-labelledby="add-review-heading" class="mt-4">
    <h2 id="add-review-heading">Dodaj recenzję</h2>

    <form method="POST" action="{{ route('reviews.store',$movie) }}" class="card p-3 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="rating">Ocena (1–10)</label>
            <input
                type="number"
                id="rating"
                name="rating"
                class="form-control"
                min="1"
                max="10"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label" for="content">Treść recenzji</label>
            <textarea
                id="content"
                name="content"
                class="form-control"
                rows="4"
                required
            ></textarea>
        </div>

        <button class="btn btn-success">
            Dodaj recenzję
        </button>
    </form>
</section>