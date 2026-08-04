@props([
    'comparevalue' => 10,
    'type' => 'show',
    'value',
])

<span @style(['font-size:18px' => $type == 'show']) @class([
    'badge',
    'ml-2' => $type == 'table',
    'bg-danger' => $value < 3.5,
    'badge-warning' => $value >= 3.5 && $value <= 5,
    'badge-primary' => $value > 5 && $value < 8,
    'badge-success' => $value >= 8,
])>{{ $value * $comparevalue . '%' }}</span>
