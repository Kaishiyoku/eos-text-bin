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
            color: #db00b6;
        }

        h1,
        h2,
        strong {
            color: #333333;
            font-weight: 400;
        }

        h2 {
            margin-top: 1rem;
            padding-top: 1rem;
        }

        pre, code {
            overflow: scroll;
            background: #e6e6f1;
        }

        code {
            padding: 2px 4px;
            vertical-align: text-bottom;
        }

        pre {
            padding: 1rem;
            color: #444444;
            border-left: 2px solid #b8bedd;
        }
    </style>
</head>
<body>

@yield('content')

</body>
</html>
