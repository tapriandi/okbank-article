<label>Image</label><br>
@if (array_get($content, $locale))
    <img src="{{ url(array_get($content, $locale)) }}" style="max-width:100%;margin-bottom:3px;">

    <label class="form-group">
        <input type="checkbox" name="remove_content[{{ $locale }}]" value="{{ $locale }}">
        Remove image
    </label>
@endif

<div class="form-group">
    <input type="file" name="content[{{ $locale }}]">
</div>