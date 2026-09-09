
@extends('layouts.master')

@section

@if ($color === 'black')
    @php($bg = 'black')
@elseif ($color === 'green')
    @php($bg = 'green')
@else
    @php($bg = 'white')
@endif

<body style="background-color: {{ $bg }};">
    <h2 style="color: white;">Bg color: {{ $color }}</h2>
</body>

