<!-- @props([
    'label' => '', 
    'name' => '', 
    'options' => [], 
    'value' => '',
    'required' => false, 
    'placeholder' => 'Select Option',
    'multiple' => false,
])

<div class="mb-3">
    @if($label)
        <label class="form-label" for="{{ $name }}">
            {{ __($label) }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <select 
        name="{{ $name }}{{ $multiple ? '[]' : '' }}"
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $multiple ? 'multiple' : '' }}
        {{ $attributes->merge(['class' => 'form-select input-style-1'])->class([
            'is-invalid' => $errors->has($name),
        ]) }}
        data-placeholder="{{ __($placeholder) }}"
    >
        @if(!$multiple)
            <option value="">{{ __($placeholder) }}</option>
        @endif

        @foreach($options as $key => $option)
            <option value="{{ $key }}"
                @selected(
                    $multiple 
                        ? collect(old($name, $value))->contains($key) 
                        : old($name, $value) == $key
                )
            >
                {{ __($option) }}
            </option>
        @endforeach
        


    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> -->


@props([
    'label' => '',
    'name',
    'options' => [],
    'value' => null,
    'required' => false,
    'multiple' => false,
])

@php
    /*
     |---------------------------------------------
     | Normalize selected value
     |---------------------------------------------
     | Single  => string|null
     | Multiple => array
     */
    if ($multiple) {
        $selected = old($name, $value ?? []);

        // ensure always array
        $selected = is_array($selected) ? $selected : [$selected];
    } else {
        $selected = old($name, $value);
    }
@endphp

<div class="mb-3">
    @if($label)
        <label class="form-label" for="{{ $name }}">
            {{ __($label) }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <select
        name="{{ $name }}{{ $multiple ? '[]' : '' }}"
        id="{{ $name }}"
        {{ $multiple ? 'multiple' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-select']) }}
        data-placeholder="{{ __($placeholder) }}"
    >

        {{-- Single select placeholder --}}
        @if(!$multiple)
            <option value="">{{ __($placeholder) }}</option>
        @endif

        {{-- Select2 multiple placeholder support --}}
       

        @foreach($options as $key => $option)
            <option value="{{ $key }}"
                @selected(
                    $multiple
                        ? in_array($key, $selected, true)
                        : $selected == $key
                )
            >
                {{ __($option) }}
            </option>
        @endforeach
         @if($multiple)
            <option></option>
        @endif
    </select>

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>


