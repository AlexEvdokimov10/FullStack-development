@extends("layout")

@section("app-title","Види")
@section("page-title","Додати вид риби")

@section("page-content")

<form method="post" action="/types" class="text-left">
{{ csrf_field() }}

<div class="form-count">
    @include("includes/input",[
        'fieldId'=>'number',
        'labelText'=>'Номер загіну',
        'placeHolderText'=>'Введіть номер'
        ])

</div>
<div class="form-count">
    @include("includes/input",[
        'fieldId'=>'squad','labelText'=>'Загін',
        'placeHolderText'=>'Введіть номер'
        ])
</div>
<div class="form-count">
    <label for="fish"> Назва типу </label>
    <select class="browser-default custom-select" name="fish_id" id="fish">
        <option selected disabled value="0">Оберіть рибу </option>
        @foreach($fishs as $fish)
        <option value="{{ $fish->id }}">{{ $fish->nameType }} </option>
        @endforeach
    </select>
    @include('includes/validationErr',['errFieldName'=>"fish_id"])
    </div>
    <button type="submit" class="btn btn-primary float-right">Додати</button>
    <div class="clearfix"></div>
</form>
