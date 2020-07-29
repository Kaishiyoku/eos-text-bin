<?php

namespace App\Http\Controllers;

class EntryController extends Controller
{
    public function show($uuid)
    {
        $entry = \App\Entry::where('uuid', $uuid)->where('expires_at', '>', \Carbon\Carbon::now())->first();

        if (!$entry) {
            return response(null, 404);
        }

        $entry->increment('number_of_views');

        return $entry->content;
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $this->validate($request, [
            'content' => ['required', 'string'],
            'expires' => ['sometimes', 'integer', 'between:5,1440'],
        ]);

        $expiresAt = \Carbon\Carbon::now()->addMinutes($data['expires']
            ?? env('DEFAULT_EXPIRE_DURATION_IN_MINUTES'));

        $entry = new \App\Entry($data);
        $entry->ip = $request->ip();
        $entry->expires_at = $expiresAt;
        $entry->save();

        return response()->json([
            'link' => route('entries.show', ['uuid' => $entry->uuid]),
            'delete_link' => route('entries.destroy', ['uuidDelete' => $entry->uuid_delete]),
            'expires_at' => $entry->expires_at,
        ]);
    }

    public function destroy($uuidDelete)
    {
        $entry = \App\Entry::where('uuid_delete', $uuidDelete)->first();

        if (!$entry) {
            return response(null, 404);
        }

        $entry->delete();

        return response()->json();
    }
}
