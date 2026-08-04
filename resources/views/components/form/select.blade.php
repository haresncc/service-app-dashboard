@props([
    'selected' => '',
    'name',
    'options',
    'size' => 2,
    'label' => true,
    'displaynam' => '',
    'blankitem' => true,
    'visibility' => true,
    'firstitem' => 'All',
])
<div @class(['form-group', 'col-md-' . $size, 'my-1' => !$label]) @style(['visibility:hidden;' => !$visibility]) id="{{ str_replace('_id', '', $name) . '-div' }}">
    @if ($label)
        <label for="{{ $name }}">{{ __($displaynam) }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->class(['form-control', 'form-control-sm' => !$label]) }}>
        @if ($blankitem)
            <option value="">{{ $label ? '' : ($displaynam == '' ? __($firstitem) : __($displaynam)) }}</option>
        @endif
        @foreach ($options as $option)
            <option value="{{ $option['id'] }}" @selected(old($name, $selected) == $option['id'])>
                {{ $option['name'] }}
            </option>
        @endforeach
    </select>
</div>


{{-- <div class="form-group col-md-2">
    <label for="behavior_catid">{{ __('Behavior') }}</label>
    <select name="behavior_catid" class="form-control" id="behavior_catid" value="{{ old('behavior_catid') }}">
        <option value=""></option>
        @foreach ($bahaviors as $bahavior)
            <option value={{ $bahavior->id }}
                @empty($customer) @selected(old('behavior_catid') == $bahavior->id) @else @selected($customer->behavior_catid == $bahavior->id) @endempty>
                {{ $bahavior->name }}</option>
        @endforeach
    </select>
</div> --}}
