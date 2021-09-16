@extends("layout")

@section("app-title")
Список риб
@endsection
@section("page-title")
{{$pageTitle}}
@endsection

@section("page-content")


<table>
	<tr><th>Назва виду</th><th>Кількість</th></tr>
	<?php foreach ($fishs as $fish): ?>
	<tr>
		<td>{{$fish->getNameType()}}></td>
		<td>{{$fish->getCount()}}</td>
	</tr>
<?php endforeach; ?>
</table>
@endsection