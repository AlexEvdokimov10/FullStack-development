@extends("layout")

@section("app-title","Види")
@section("page-title","Види риб")

@section("page-content")
<a href="/types/create" class="btn btn-outline-success float-left" style="...">
Додати тип
</a>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Номер</th>
            <th scope="col">Загін </th>
            <th scope="col"></th>
        </tr>
    </thead>
<tbody>
    @foreach($types as $type)
    <tr>
        <td>{{ $type->number }}</td>
        <td>{{ $type->squad }}</td>
        <td><a href="/types/{{ $type->id }}" class="btn btn-outline-secondary"> Review </a>
        <a href="/types/{{ $type->id }}/edit" class="btn btn-outline-primary">Edit </a></td>
    </tr>
    @endforeach

</table>
@endsection
