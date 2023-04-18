@props(['route', 'orderBy', 'value'])

<th scope="col" class="px-6 py-3">
    <a  {{ $attributes->merge(['class' => "text-decoration-none text-light"]) }} href="{{ route($route, ['orderBy' => ($orderBy === $value) ? $value.'-desc' : $value]) }}">
        {{ $slot }}
        @isset($orderBy)
            @if(in_array($orderBy, [ $value , $value.'-desc']))
                <i class="fas fa-sort-{{ $orderBy === $value ? 'up' : 'down' }}"></i>
            @else
                <i class="fas fa-sort"></i>
            @endif
        @endisset
    </a>
</th>