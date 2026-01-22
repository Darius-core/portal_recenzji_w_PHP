<fieldset class="mb-3">
    <legend>Aktorzy</legend>
    @foreach($actors as $actor)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="actors[]" value="{{ $actor->id }}"
            {{ isset($movie) && $movie->actors->contains($actor->id) ? 'checked' : '' }}
            id="actor-{{ $actor->id }}">
        <label class="form-check-label" for="actor-{{ $actor->id }}">
            {{ $actor->first_name }} {{ $actor->last_name }}
        </label>
    </div>
    @endforeach
</fieldset>

<fieldset class="mb-3">
    <legend>Reżyserzy</legend>
    @foreach($directors as $director)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="directors[]" value="{{ $director->id }}"
            {{ isset($movie) && $movie->directors->contains($director->id) ? 'checked' : '' }}
            id="director-{{ $director->id }}">
        <label class="form-check-label" for="director-{{ $director->id }}">
            {{ $director->first_name }} {{ $director->last_name }}
        </label>
    </div>
    @endforeach
</fieldset>