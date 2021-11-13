@extends("layout")

@section("app-title","Список студентів")
@section("page-title","Додати студента")


@section("page-content")
    <form method="post" action="/fishs" class="text-left" class="text-left">
        {{csrf_field()}}
        <div class="form-count">
            @include("includes/input",[
    'fieldId'=>'fish-name','labelText'=>'Имя виду',
    'placeHolderText'=>'Ведіть имя виду'
])
        </div>
        <div class="form-count">
            @include("includes/input",[
        'fieldId'=>'fish-count','labelText'=>'Кількість',
        'placeHolderText'=>'Введіть кількість'
        ])
        </div>
        <div class="form-count">
            <label for="fish-type">
                Загін
            </label>
            <select class="browser-default custom-select" name="fish-type" id="fish-type">
                <option selected disabled value="0">
                    Оберіть загін
                </option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->number }} </option>
                @endforeach

            </select>
            @include('includes/validationErr',['errFieldName'=>'fish->type'])
        </div>
       <button type="submit" class="btn btn-primary float-right">Додати </button>
        <div class="clearfix"></div>
    </form>
@endsection



