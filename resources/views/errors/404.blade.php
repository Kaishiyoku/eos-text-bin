@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <h1>404 - Page not found</h1>

        <a href="{{ url('/') }}" class="btn btn-outline-primary">Back</a>
    </div>
@endsection
