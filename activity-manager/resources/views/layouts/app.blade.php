<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activity Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px auto;
            max-width: 800px;
            line-height: 1.6;
            color: #1f2937;
            background-color: #f8fafc;
        }
        .card {
            background: #ffffff;
            border: 1px solid #dbe2ea;
            padding: 20px;
            margin-bottom: 16px;
            border-radius: 8px;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            background: #e2e8f0;
            font-size: 0.85rem;
            font-weight: bold;
        }
        a {
            color: #2563eb;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <main>
        @yield('content')
    </main>
</body>
</html>