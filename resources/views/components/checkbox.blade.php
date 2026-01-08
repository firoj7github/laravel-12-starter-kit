@props([
    'id' => null,
    'name' => '',
    'value' => '',
    'label' => '',
    'checked' => false,
    'required' => false,
])

@php
    $inputId = $id ?? $name.'_'.$value;
@endphp

<div class="form-check mb-2">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $inputId }}"
        value="{{ $value }}"
        class="form-check-input {{ $errors->has($name) ? 'is-invalid' : '' }}"
        @if($checked) checked @endif
        @if($required) required @endif
        {{ $attributes }}
    >
    <label class="form-check-label" for="{{ $inputId }}">
        {{ __($label) }}
        @if($required)<span class="text-danger">*</span>@endif
    </label>

    @if($errors->has($name))
        <div class="invalid-feedback d-block">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
