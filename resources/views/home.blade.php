@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <p class="mb-5">
            <a href="{{ route('entries.create') }}" class="btn btn-outline-primary">Create entry</a>
        </p>

        <h1>Usage</h1>

        <h2>Retrieve entry</h2>

        <p>Just follow the url you get when you create an entry.</p>

        <h2>Create entry</h2>

        <div class="mb-5">
            <pre><code>curl -d "content=YOUR CONTENT&expires=60" -H "Content-Type: application/x-www-form-urlencoded" -H "Accept: application/json" -X POST {{ route('entries.store') }}</code></pre>
        </div>

<div class="mb-5">
    <pre><code>fetch('{{ route('entries.store') }}', {
    method: 'POST',
    headers: {
        'Content-Type' => 'application/x-www-form-urlencoded',
        'Accept' => 'application/json',
    },
    body: {
        content: 'YOUR CONTENT', // your text content
        expires: 60, // expiration in minutes, defaults to {{ env('DEFAULT_EXPIRE_DURATION_IN_MINUTES') }} if field not set
    },
})</code></pre>
</div>

        <p class="mb-5">
            Returns:
        </p>

<div class="mb-5">
    <pre><code class="php">{
    "link": "{{ route('entries.show', ['uuid' => '<KEY_UUID>']) }}",
    "delete_link": {{ route('entries.destroy', ['uuidDelete' => '<KEY_UUID_DELETE>']) }}",
    "expires_at": "2020-07-29T17:19:18.045340Z"
}</code></pre>
</div>

        <p>The expires field is optional. A minimum of 5 and a maximum of 1440 minutes can be set. Default is {{ env('DEFAULT_EXPIRE_DURATION_IN_MINUTES') }} minutes until the entry expires.</p>

        <h2>Delete entry</h2>

        <p>When creating an entry you get a delete link. Just call this link as a GET request.</p>
    </div>
@endsection
