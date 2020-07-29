@extends('layouts.app')

@section('content')
    <form action="{{ route('entries.store') }}" method="post">
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" required></textarea>
        </div>

        <div>
            <label for="expires">Expires (minutes):</label>
            <input type="number" name="expires" id="expires" min="5" max="1440" step="5"/>
        </div>

        <div>
            <button type="submit">Create</button>
        </div>
    </form>
@endsection('content')
