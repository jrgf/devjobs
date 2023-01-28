    @php
        $clases = "text-xs text-gray-500 hover:text-gray-900 "
    @endphp
    <a {{$attributes->merge(['class'=>$clases]) }}>
        {{$slot}}
    </a>
