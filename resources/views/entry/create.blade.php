@extends('layouts.app')

@section('content')
    <div class="card p-5">
        <h1>Add</h1>

        <form action="{{ route('entries.store') }}" method="post">
            <div class="mb-4">
                <label for="content" class="label label-required">Content</label>
                <textarea name="content" id="content" class="input" rows="15" placeholder="Content" required></textarea>
            </div>

            <div class="mb-4">
                <label for="expires" class="label">Expires (minutes)</label>
                <input type="number" name="expires" id="expires" min="5" max="1440" step="5" class="input" placeholder="Expires (minutes)"/>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection('content')
