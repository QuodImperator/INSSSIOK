<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jet Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn {
            padding: 6px 12px;
            width: auto !important;
            min-width: 60px;
        }

        .btn-group {
            display: flex;
            gap: 5px;
        }

        .btn-group form {
            margin: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('jets.index') }}">Jet Management</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jets.index') }}">Jets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jets.create') }}">Add New Jet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reviews.index') }}">Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div class="container">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
    @endif

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>