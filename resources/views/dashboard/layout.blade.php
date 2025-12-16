<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/
bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
<aside class="bg-dark text-white p-3" style="width:220px; min-height:100vh">
<h5>Dashboard</h5>
<ul class="nav flex-column">
<li class="nav-item"><a href="/dashboard" class="nav-link text-
white">Home</a></li>
<li class="nav-item"><a href="/dashboard/berita" class="nav-link text-
white">Berita</a></li>
<li class="nav-item"><a href="/dashboard/users" class="nav-link text-
white">Users</a></li>
</ul>
</aside>
<main class="p-4 flex-fill">
@yield('content')
</main>
</div>
</body>
</html>