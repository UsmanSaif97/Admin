@extends('layouts.app')

@section('content')
<h1>Investors</h1>
<ul>
    @foreach($investors as $investor)
        <li><a href="{{ route('investors.show', $investor->id) }}">{{ $investor->name }}</a></li>
    @endforeach
</ul>
@endsection