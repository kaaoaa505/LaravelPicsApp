@props(['title' => ''])

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Just for test">
    <meta name="author" content="Khaled Allam">

    <title>{{ $title }} | PicsApp</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <x-icon src="/icons/logo.svg" alt="" width="30" height="24"
                    class="d-inline-block align-text-top color-light" />
                PicsApp
            </a>
            <div class="d-flex">
                <a href='{{ route('images.create') }}' class="btn btn-success">Upload</a>
                
                
                {{-- <a href='#' class="btn btn-outline-secondary me-2">Register</a>
                <a href='#' class="btn btn-danger">Login</a>
                 --}}
            </div>
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-light text-muted py-3 mt-5 border-top">
        <div class="container-fluid">
            <p class="float-end mb-1">
                <a href="#" class="text-decoration-none">Back to top</a>
            </p>
            <p>PicsApp provides beautiful, high quality photos.</p>
            <p>&copy; {{date('Y')}} PicsApp</p>
        </div>
    </footer>

</body>

</html>
