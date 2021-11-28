@extends("layout")

@section("app-title")
Список риб
@endsection
@section("page-title")

@endsection

@section("page-content")

<table>
	<tr>
        <td>Назва виду</td><td>Кількість</td>

    </tr>
	@foreach($fishs as $fish)
	<tr>
		<td>{{ $fish->getNameType() }}</td>
		<td>{{ $fish->getCount() }}</td>
	</tr>
	@endforeach
</table>
@endsection
