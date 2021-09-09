<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		@yield("app-title","Довідник риб")
	</title>
</head>
<body>
<ul>
	<li><a href="/">Головна</a></li>
	<li> <a href="/fishs"> Акваріум </a> </li>
	<li> <a href="/about">Про проект</a> </li>
</ul>
<h1>
	@yield("page-title")
</h1>
@yield("page-content")
</body>
</html>