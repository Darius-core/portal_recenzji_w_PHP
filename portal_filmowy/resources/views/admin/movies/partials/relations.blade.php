<fieldset>
<legend>Aktorzy</legend>
@foreach($actors as $actor)
<label>
<input type="checkbox" name="actors[]" value="{{ $actor->id }}"
    {{ isset($movie) && $movie->actors->contains($actor->id) ? 'checked' : '' }}>
{{ $actor->first_name }} {{ $actor->last_name }}
</label>
@endforeach
</fieldset>

<fieldset>
<legend>Reżyserzy</legend>
@foreach($directors as $director)
<label>
<input type="checkbox" name="directors[]" value="{{ $director->id }}"
    {{ isset($movie) && $movie->directors->contains($director->id) ? 'checked' : '' }}>
{{ $director->first_name }} {{ $director->last_name }}
</label>
@endforeach
</fieldset>