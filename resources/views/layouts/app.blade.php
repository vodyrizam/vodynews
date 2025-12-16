<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','News Portal')</title>
<meta name="description" content="Portal Berita Laravel">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/
bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ ('assets/css/style.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
<a class="navbar-brand" href="/">NewsPortal</a>
<ul class="navbar-nav ms-auto">
<li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
</ul>
</div>
</nav>
<div class="container my-4">
@yield('content')
</div>
<footer class="bg-light py-3 text-center">
<small>© {{ date('Y') }} News Portal</small>
</footer>
</body>
</html>