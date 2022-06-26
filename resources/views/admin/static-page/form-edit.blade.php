@if (empty($fields))
    <div class="form-group">
        No editable fields for this page
    </div>
@else
@foreach ($fields as $field_key => $field)
    <label>{{ $field['label'] }}</label>
    <div class="form-group">
    @switch ($field['type'] ?? 'text')
        @case('text')
            <input type="text" name="fields[{{ $locale }}][{{ $field_key }}]" value="{{ array_get($values, $locale . '.' . $field_key) }}" class="form-control">
            @break
        @case('multi')
            <textarea name="fields[{{ $locale }}][{{ $field_key }}]" class="form-control">{{ array_get($values, $locale . '.' . $field_key) }}</textarea>
            @break
        @case('html')
            @php
                $_component_id = str_random(8);
            @endphp
            <textarea id="{{ $_component_id }}" name="fields[{{ $locale }}][{{ $field_key }}]" class="form-control">{{ array_get($values, $locale . '.' . $field_key) }}</textarea>

            <script>
                window.onload = (function(_load) { return function() {
                    _load && _load();
                    CKEDITOR.replace('{{ $_component_id }}', {
                        autoParagraph: false,
                        allowedContent: true
                    });
                }})(window.onload);
            </script>
            @break
    @endswitch
    </div>            
@endforeach
@endif
