<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}} ">
<link rel="stylesheet" href="{{ asset("css/cover.css")  }}">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
	<script src="{{asset("js/bootstrap.js")}}"></script>
    <title>
		@yield("app-title","Довідник риб")
	</title>
</head>
<body class="text-center">
<div class="cover-containe d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead md-auto">
        <div class="inner">
            <h3 class="masthead-brand">@yield("app-title")</h3>
        <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="/"> Головна </a>
            <a class="nav-link" href="/types">Типи</a>
            <a class="nav-link" href="/type/0/fishs"> Акваріум </a>
            <a class="nav-link" href="/about"> Про проект </a>
        </nav>
        </div>
    </header>
    <main role="main" class="inner cover">
        <h1 class="cover-heading">
            @yield("page-title")
        </h1>
        @yield("page-content")
    </main>
    <footer class="mastfoot mt-auto">
        <div class="inner">
            @yield("page-footer")
        </div>
    </footer>
</div>

</body>
</html>
