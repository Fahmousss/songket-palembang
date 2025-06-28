@props(['disabled' => false, 'options' => [], 'placeholder' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-lg shadow-sm block w-full',
]) !!}>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    @if (is_array($options))
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>
