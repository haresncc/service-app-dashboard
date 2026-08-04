@props([
    'name',
    'dataheaders',
    'datas',
    'fields',
    'iconon' => '',
    'iconoff' => '',
    'action' => ['show', 'edit', 'delete'],
])


<div class="table-responsive">
    <table class="table mt-2">
        <thead>
            <tr>
                @foreach ($dataheaders as $dataheader)
                    <th scope="col">{{ __($dataheader) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    @foreach ($fields as $field)
                        @if (in_array($field, ['card_img1', 'card_img2', 'hire_img', 'contract_doc', 'ekr_img1']))
                        <td> @empty($data->$field)
                                {{ '-' }}
                            @else
                                <a href="{{ asset('uploads/' . $data->$field) }}" target="_blank">{{ __('File') }}</a>
                            @endempty
                        </td>
                        @continue
                    @endif
                    @if (in_array($field, ['file_imp']))
                        <td><a onclick="return confirmDownldFn();"
                                href="{{ route('dashboard.' . $name . '.download', basename($data->$field)) }}">{{ __('Download') }}</a>
                        </td>
                        @continue
                    @endif
                    @if (in_array($field, ['close_inv', 'active']))
                        @if (!$data->$field)
                            <td> <i class="{{ $iconoff }}" style="color: #dd0e0e;"></i> </td>
                        @else
                            <td> <i class="{{ $iconon }}" style="color: #29a143;"></i> </td>
                        @endif
                        @continue
                    @endif
                    @if (!is_array($field))
                        <td><bdi>{{ $data->$field }}</bdi></td>
                    @else
                        @if (count($field) == 2)
                            @if ($field == ['customer', 'name'])
                                <td><bdi>{!! Str::words($data[$field[0]][$field[1]], 3, '..') !!}</bdi></td>
                            @else
                                <td><bdi>{{ $data[$field[0]][$field[1]] ?? '-' }}</bdi></td>
                            @endif
                        @elseif(count($field) == 3)
                            <td><bdi>{{ $data[$field[0]][$field[1]][$field[2]] ?? '-' }}</bdi></td>
                        @elseif(count($field) == 4)
                            <td><bdi>{{ $data[$field[0]][$field[1]][$field[2]][$field[3]] ?? '-' }}</bdi></td>
                        @endif
                    @endif
                @endforeach
                @if (count($action) > 0)
                    <td>
                        @if (in_array('show', $action))
                            <a href="{{ route('dashboard.' . $name . '.show', $data->id) }}"
                                class="btn btn-info btn-sm">{{ __('View') }}</a>
                        @endif
                        @if (in_array('edit', $action))
                            @can('edit ' . $name)
                                <a href="{{ route('dashboard.' . $name . '.edit', $data->id) }}"
                                    class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                            @endcan
                        @endif
                        @if (in_array('delete', $action))
                            @can('delete ' . $name)
                                <form style="display:inline;" method="POST"
                                    action="{{ route('dashboard.' . $name . '.destroy', $data->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirmDelFn();" type="submit"
                                        class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                </form>
                            @endcan
                        @endif
                        @if (in_array('print', $action))
                            <a href="{{ route('dashboard.' . $name . '.print', $data->id) }}" target="_blank"
                                class="btn btn-primary btn-sm">{{ __('Print') }}</a>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="d-flex pag-big">
{{ $datas->withQueryString()->onEachSide(0)->links() }}
<p class="page-link ml-2">
    {{ ($datas->currentPage() - 1) * $datas->perPage() + 1 . 'to' }}
    {{ min($datas->currentPage() * $datas->perPage(), $datas->total()) }} &nbsp of &nbsp
    {{ $datas->total() }}
</p>
</div>
<div class="d-none pag-small">
<nav>
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="{{ $datas->previousPageUrl() }}" rel="prev">« السابق</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{ $datas->nextPageUrl() }}" rel="next">التالي »</a>
        </li>
    </ul>
</nav>
<p class="page-link ml-2">
    {{ $datas->currentPage() }}
</p>
<p class="page-link ml-2">
    {{ $datas->total() }}
</p>
</div>


{{-- <td>{{ $customer->natid }}</td>
<td> @empty($customer->card_img1)
        {{ '-' }}
    @else
        <a href="{{ asset('uploads/' . $customer->card_img1) }}" target="_blank">Card1</a>
    @endempty
</td>
<td> @empty($customer->card_img2)
        {{ '-' }}
    @else
        <a href="{{ asset('uploads/' . $customer->card_img2) }}" target="_blank">Card2</a>
    @endempty
</td> --}}
