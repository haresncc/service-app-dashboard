@props([
    'type' => 'text',
    'name',
    'size' => 2,
    'value' => '',
    'label' => true,
    'displaynam' => '',
    'readonly' => false,
])
<div @class(['form-group', 'col-md-' . $size, 'my-1' => !$label]) id="{{ str_replace('_id', '', $name) . '-div' }}">
    @if ($label)
        <label for="{{ $name }}">{{ __($displaynam) }}</label>
    @endif
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ __($displaynam) }}" @readonly($readonly)
        {{ $attributes->class([
            'form-control' => $type != 'file',
            'form-control-file' => $type == 'file',
            'form-control-sm' => !$label,
            'is-valid' => session()->has($name),
            'is-invalid' => $errors->has($name),
        ]) }}>
    @if (session()->has($name) || $errors->has($name))
        <div id="vaildcus" @class([
            'valid-feedback' => session()->has($name),
            'invalid-feedback' => $errors->has($name),
        ])>
            {{ session($name) ?? ('' . $errors->messages()[$name][0] ?? '') }}
        </div>
    @endif
</div>
