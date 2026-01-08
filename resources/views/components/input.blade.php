@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'value' => '',
    'required' => false
])

<div class="mb-4">
    {{-- Label --}}
    @if($label)
        <label for="{{ $name }}" class="form-label">
            {{ __($label) }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    {{-- Input field --}}
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{-- Proper class merge --}}
        {{ $attributes->class([
            'form-control',
            'input-style-1',
            'is-invalid' => $errors->has($name)
        ]) }}
        placeholder="{{ $attributes->get('placeholder') }}"
    >

    {{-- Validation error --}}
    @if($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
