@props([
    'type' => 'submit',
    'color' => 'primary',
    'size' => '',
    'icon' => '',
    'block' => false
])

<button type="{{ $type }}"
    {{ $attributes->class([
        "btn btn-$color",
        "btn-$size" => $size,
        "w-100" => $block,
    ]) }}>
    @if($icon)
        <i class="{{ $icon }} me-1"></i>
    @endif
    
    {{ $slot }}
</button>
