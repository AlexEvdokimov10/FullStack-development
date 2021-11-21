@extends("layout")

@section("app-title")
    Список риб
@endsection

@section("page-title")
    Перегляд даних риб
@endsection

@section("page-content")
    <h2>
        Риба {{$fish->nameType}}
    </h2>
    <h5>
        Кількість {{$fish->count}}
    </h5>
    <a href="/type/{{ $type_filter_id }}/fishs" style="margin-top: 30px;" class="btn-outline-info">
        Повертнутися до списку
    </a>
@endsection
