<h2>{{$module}} {{$creditValue}}</h2>

<ul>
    @foreach($topics as $topic)
        <li>{{ $topic }}</li>
    @endforeach
</ul>