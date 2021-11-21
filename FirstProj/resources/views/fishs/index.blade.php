@extends("layout")

@section("app-title")
    Список риб
@endsection

@section("page-title")
    {{$pageTitle}}
@endsection


@section("page-content")

        <div class="form-count">
            <select class="browser-default custom-select" name="fish-type->filter" id="fish-type-filter" >
                <option value="0" >
                    Всі загони
                </option>
                @foreach($types as $type)
                    <option @if($type->id==$type_filter_id) selected @endif
                    value="{{ $type->id }}">{{$type->number}}
                    </option>
                @endforeach
            </select>
            <script>
                $('#fish-type-filter').change(()=>{
                    var id=$('#fish-type-filter').val();
                    var url="/type/"+id+"/fishs";
                    location.href=url;
                });
            </script>
        </div>
        <form method="post" action="/type/{{ $type_filter_id }}/fishs" class="text-left">
            <div class="form-count">
                <a href="/type/{{ $type_filter_id }}/fishs/create" class="btn btn-outline-succes float-left" style="margin-bottom: 10px;">
                    Додати рибу
                </a>
                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Назва виду</th>
                        <th scope="col">Кількість</th>
                        <th scope="col">Загін</th>
                    </tr>
                    </thead>

                    @foreach($fishs as $fish)
                        <tr>
                            <td>{{ $fish->nameType }}</td>
                            <td>{{ $fish->count }}</td>
                            <td>{{ $fish->type->number  }}</td>

                            <td>
                                <a href="/type/{{ $type_filter_id }}/fishs/{{$fish->id}}" class="btn btn-outline-secondary">Переглянути</a>
                                <a href="/type/{{ $type_filter_id }}/fishs/{{ $fish->id }}/edit" class="btn btn-outline-primary">
                                    Редагувати
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </form>
@endsection
