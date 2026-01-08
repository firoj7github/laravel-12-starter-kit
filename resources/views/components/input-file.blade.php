@props([
    'label' => '',
    'name' => '',
    'value' => null,
])

<div class="mb-3">
    @if($label)
        <label class="form-label">{{ $label }}</label>
    @endif

    <div class="file-preview-wrapper">

        <input
            type="file"
            name="{{ $name }}"
            id="{{ $name }}"
            class="form-control image-input input-style-1"
            data-preview="#{{ $name }}Preview"
            data-placeholder="#{{ $name }}Placeholder"
        >

        {{-- TEXT PLACEHOLDER --}}
        @if(!$value)
            <div
                id="{{ $name }}Placeholder"
                class="file-placeholder-text">
                No image
            </div>
        @endif

        {{-- IMAGE PREVIEW --}}
        <img
            id="{{ $name }}Preview"
            class="file-overlay-preview"
            src="{{ $value ? asset($value) : '' }}"
            style="{{ $value ? '' : 'display:none' }}">
    </div>
</div>
