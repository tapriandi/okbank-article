@php
    $_component_id = str_random(8);
@endphp

<div class="form-group">
    <label>Block Content</label>
    <textarea id="{{ $_component_id }}" class="form-control" name="content[{{ $locale }}]">{{ array_get($content, $locale) }}</textarea>
</div>

<script>
    window.onload = (function(_load) { return function() {
        _load && _load();
        CKEDITOR.replace('{{ $_component_id }}', {
            autoParagraph: false,
            allowedContent: true
        });
    }})(window.onload);
</script>
