<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/show/{uuid}', ['as' => 'entries.show', function ($uuid) {
    $entry = \App\Entry::where('uuid', $uuid)->where('expires_at', '>', \Carbon\Carbon::now())->first();

    if (!$entry) {
        return response(null, 404);
    }

    $entry->increment('number_of_views');

    return $entry->content;
}]);

$router->post('/', ['as' => 'entries.create', function (\Illuminate\Http\Request $request) {
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
}]);

$router->get('/delete/{uuidDelete}', ['as' => 'entries.destroy', function ($uuidDelete) {
    $entry = \App\Entry::where('uuid_delete', $uuidDelete)->first();

    if (!$entry) {
        return response(null, 404);
    }

    $entry->delete();

    return response()->json();
}]);
