@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <p class="mb-4">
            Link: <a href="{{ $link }}" class="link">{{ $link }}</a>
        </p>

        <p class="mb-4">
            Delete link: <a href="{{ $deleteLink }}" class="link">{{ $deleteLink }}</a>
        </p>

        <p class="mb-4">
            Expires at: {{ $expiresAt }}
        </p>
    </div>
@endsection('content')
