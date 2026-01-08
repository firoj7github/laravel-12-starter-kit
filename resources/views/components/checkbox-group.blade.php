@props([
    'label' => '',
    'name' => '',
    'options' => [],
    'values' => []
])

<div class="form-group">
    @if($label)
        <label class="form-label">{{ $label }}</label>
    @endif

    @foreach($options as $key => $text)
        <div class="mb-2">
            <label>
                <input type="checkbox"
                       name="{{ $name }}[]"
                       value="{{ $key }}"
                       @checked(is_array($values) && in_array($key, $values))>
                {{ $text }}
            </label>
        </div>
    @endforeach
</div>
