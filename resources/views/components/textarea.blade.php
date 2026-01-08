@props([
    'label' => null,
    'name',
    'placeholder' => '',
    'value' => null,
    'editor' => false,
])

<div class="form-group">
    @if($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'form-control ' . ($editor ? 'summernote' : ''),
            'placeholder' => $placeholder,
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
