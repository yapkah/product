<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('title','Product Admin')</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
<nav>
<a href="{{ route('products.index') }}">Products</a> |
<a href="{{ route('categories.index') }}">Categories</a>
</nav>
</header>
<main>
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif
@yield('content')
</main>
</body>
</html>
