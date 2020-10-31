@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <h1>429 - Too many requests</h1>

        <a href="{{ url('/') }}" class="btn btn-outline-primary">Back</a>
    </div>
@endsection
