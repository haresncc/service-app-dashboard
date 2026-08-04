@props(['filetype' => 'img', 'name', 'size' => 2, 'value' => '', 'label' => true, 'displaynam' => ''])
<div class="d-flex col-md-{{ $size }} align-items-center">
    <div class="form-group col-md-8">
        @if ($label)
            <label for="{{ $name }}">{{ __($displaynam) }}</label>
        @endif
        <input type="file" name="{{ $name }}" class="form-control-file" id="{{ $name }}"
            {{ $attributes }} @error($name) required @enderror>
    </div>
    <div class="col-md-4" id="{{ $name . '-divshow' }}" @style(['text-align:left', 'visibility: hidden' => $value == ''])>
        @if ($filetype == 'img')
            <a href="{{ $value != '' ? asset('uploads/' . $value) : '#' }}"
                target="{{ $value != '' ? '_blank' : '_self' }}">
                <img src="{{ $value != '' ? asset('uploads/' . $value) : '' }}" class="img-thumbnail mt-2 ml-3"
                    width="40" height="50">
            </a>
        @else
            <a href="{{ $value != '' ? asset('uploads/' . $value) : '#' }}"
                target="{{ $value != '' ? '_blank' : '_self' }}">
                <i class="fas fa-file-alt fa-lg mt-2 ml-3" style="font-size: 30px;color:#6383bb;"></i>
            </a>
        @endif
    </div>
</div>
