@extends("layout")

@section("app-title")
    Список риб
@endsection

@section("page-title")
    {{$pageTitle}}
@endsection


@section("page-content")
    <form method="post" action="/fishs" class="text-left">
        <div class="form-count">
            <a href="/fishs/create" class="btn btn-outline-succes float-left" style="margin-bottom: 10px;">
    Додати рибу
    </a>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Назва виду</th>
            <th scope="col">Кількість</th>
        </tr>
        </thead>

        @foreach($fishs as $fish)
            <tr>
                <td>{{ $fish->nameType }}</td>
                <td>{{ $fish->count }}</td>

                <td>
                    <a href="/fishs/{{$fish->id}}" class="btn btn-outline-secondary">Переглянути</a>
                    <a href="/fishs/{{ $fish->id }}/edit" class="btn btn-outline-primary">
                        Редагувати
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
        </div>
    </form>
@endsection
