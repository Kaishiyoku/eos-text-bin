<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME', 'Lumen') }}</title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/languages/php.min.js"></script>

    <style>
        @import 'https://fonts.googleapis.com/css?family=Roboto:300,400,500';

        body {
            margin: 0 auto;
            max-width: 50rem;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            line-height: 1.5;
            padding: 4em 1rem;
            color: #566b78;
        }

        a {
            color: #e81c4f;
        }

        h1,
        h2,
        strong {
            color: #333;
            font-weight: 400;
        }

        h2 {
            margin-top: 1rem;
            padding-top: 1rem;
        }

        pre, code {
            overflow: scroll;
            background: #f5f7f9;
        }

        code {
            padding: 2px 4px;
            vertical-align: text-bottom;
        }

        pre {
            padding: 1rem;
            border-bottom: 1px solid #d8dee9;
            border-left: 2px solid #69c;
        }
    </style>
</head>
<body>

<h1>Usage</h1>

<h2>Retrieve entry</h2>

<p>Just follow the url you get when you create an entry.</p>

<h2>Create entry</h2>

<pre><code>curl -d "content=YOUR CONTENT&expires=60" -H "Content-Type: application/x-www-form-urlencoded" -H "Accept: application/json" -X POST {{ route('entries.store') }}
</code></pre>

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
})
</code></pre>

<p>
    Returns:
</p>

<pre><code class="php">{
    "link": "{{ route('entries.show', ['uuid' => '<KEY_UUID>']) }}",
    "delete_link": {{ route('entries.destroy', ['uuidDelete' => '<KEY_UUID_DELETE>']) }}",
    "expires_at": "2020-07-29T17:19:18.045340Z"
}
</code></pre>

<p>The expires field is optional. A minimum of 5 and a maximum of 1440 minutes can be set. Default is {{ env('DEFAULT_EXPIRE_DURATION_IN_MINUTES') }} minutes until the entry expires.</p>

<h2>Delete entry</h2>

<p>When creating an entry you get a delete link. Just call this link as a GET request.</p>

</body>
</html>
