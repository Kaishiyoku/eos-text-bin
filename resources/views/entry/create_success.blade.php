@extends('layouts.app')

@section('content')
    <p>
        Link: <a href="{{ $link }}">{{ $link }}</a>
    </p>

    <p>
        Delete link: <a href="{{ $deleteLink }}">{{ $deleteLink }}</a>
    </p>

    <p>
        Expires at: {{ $expiresAt }}
    </p>
@endsection('content')
