@extends("layout")

@section("app-title","Види")
@section("page-title","Перегляд даних видів риб")

@section("page-content")

<h2 class="text-info">Номер виду {{ $type->number }} </h2>
<h5>Загін {{ $type->squad }} </h5>
<h4>Им'я виду {{ $type->fish->nameType }} </h4>
<a href="/types" style='...' class="btn btn-outline-info">Повернутися до списку
</a>
@endsection