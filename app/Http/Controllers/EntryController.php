<?php

namespace App\Http\Controllers;

use App\Models\Entry;

class EntryController extends Controller
{
    public function show($uuid)
    {
        $entry = Entry::where('uuid', $uuid)->where('expires_at', '>', \Carbon\Carbon::now())->first();

        if (!$entry) {
            return response(null, 404);
        }

        $entry->increment('number_of_views');

        return response($entry->content)->header('Content-Type', 'text/plain');
    }

    public function create()
    {
        return view('entry.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $this->validate($request, [
            'content' => ['required', 'string'],
            'expires' => ['sometimes', 'integer', 'between:5,1440'],
        ]);

        $expiresAt = \Carbon\Carbon::now()->addMinutes($data['expires']
            ?: env('DEFAULT_EXPIRE_DURATION_IN_MINUTES'));

        $entry = new Entry($data);
        $entry->ip = $request->ip();
        $entry->expires_at = $expiresAt;
        $entry->save();

        $link = route('entries.show', ['uuid' => $entry->uuid]);
        $deleteLink = route('entries.destroy', ['uuidDelete' => $entry->uuid_delete]);
        $expiresAt = $entry->expires_at;

        if ($request->expectsJson()) {
            return response()->json([
                'link' => $link,
                'delete_link' => $deleteLink,
                'expires_at' => $expiresAt,
            ]);
        }

        return view('entry.create_success', compact('link', 'deleteLink', 'expiresAt'));
    }

    public function destroy($uuidDelete)
    {
        $entry = Entry::where('uuid_delete', $uuidDelete)->first();

        if (!$entry) {
            return response(null, 404);
        }

        $entry->delete();

        return response()->json();
    }
}
