    <div class="card">
        <h5 class="card-header py-1 font-weight-normal"
            style="background-color: rgb(169 0 100 / 79%);font-size: 18px; color:white">{{ __('Info') }}
            @yield('title')</h5>
        <div class="card-body">
            @for ($i = 0; $i < count($keys); $i = $i + 2)
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div>
                            <strong>{{ __(str_replace(['_id', '_catid'], '', $keys[$i])) }}:&nbsp;</strong>
                            @if (in_array($keys[$i], ['created_at', 'updated_at']) && isset($showArr[$keys[$i]]))
                                {{ Helper::dateFormater($showArr[$keys[$i]]) }}
                            @elseif(str_contains($keys[$i], 'price') ||
                                    str_contains($keys[$i], 'cost') ||
                                    str_contains($keys[$i], 'value') ||
                                    str_contains($keys[$i], 'balance'))
                                {{ Helper::currencyFormater($showArr[$keys[$i]]) }}
                            @else
                                {{ $showArr[$keys[$i]] }}
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            @if ($i + 1 < count($keys))
                                <strong>{{ __(str_replace(['_id', '_catid'], '', $keys[$i + 1])) }}:&nbsp;</strong>
                                @if (in_array($keys[$i + 1], ['created_at', 'updated_at']) && isset($showArr[$keys[$i + 1]]))
                                    {{ Helper::dateFormater($showArr[$keys[$i + 1]]) }}
                                @elseif(str_contains($keys[$i + 1], 'price') || str_contains($keys[$i + 1], 'cost') || str_contains($keys[$i + 1], 'value'))
                                    {{ Helper::currencyFormater($showArr[$keys[$i + 1]]) }}
                                @else
                                    {{ $showArr[$keys[$i + 1]] }}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="col mb-3">
            @if (isset($imgAr['pdf1']))
                <a style="font-size: 16px;" href="{{ asset('uploads/' . $imgAr['pdf1']) }}" target="_blank">
                    Download PDF File
                    <i class="fas fa-file-pdf mx-1" style="color: red"></i>
                </a>
            @endif
        </div>
        @if (isset($imgAr['img1']))
            <div class="col">
                <img style="max-width: 100%;border:1px solid blue;margin-bottom:15px "
                    src="{{ asset('storage/uploads/' . $imgAr['img1']) }}" alt="No img">
            </div>
        @endif
        <div class="col">
            @if (isset($imgAr['img2']))
                <img style="max-width: 100%;border:1px solid blue" src="{{ asset('storage/uploads/' . $imgAr['img2']) }}"
                    alt="No img">
            @endif
        </div>
        <div class="col">
            @if (isset($imgAr['img3']))
                <img style="max-width: 100%;border:1px solid blue" src="{{ asset('storage/uploads/' . $imgAr['img3']) }}"
                    alt="No img">
            @endif
        </div>
    </div>
