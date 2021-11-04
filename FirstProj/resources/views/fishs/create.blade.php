@extends("layout")

@section("app-title","Список студентів")
@section("page-title","Додати студента")


@section("page-content")
    <form method="post" action="/fishs" class="text-left" class="text-left">
        {{csrf_field()}}
        <div class="form-count">
            <label for="fish-name"> Назва типу</label>
            <input  type="text" value="{{ old('fish-name') }}" class="form-control {{$errors->has('fish-name') ? 'is-invalid':''}} " name="fish-name" id="fish-name" placeholder="Ведіть ім'я">
        <small class="form-text text-danger">
            <ul>
                @foreach($errors->get('fish-name') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </small>
        </div>
        <div class="form-count">
            <label for="fish-count">
                Кількість
            </label>
             <input required minlength="1" value="{{ old('fish-count') }}" maxlength="100" type="text" class="form-control {{ $errors->has('fish-count') ? 'is-invalid':'' }}" 
            name="fish-count" id="fish-count" placeholder="Кількість"> 
        </div>
        <small class="form-text text-danger">
           <ul>
               @foreach($errors->get('fish-count') as $error)
                   <li> {{$error}}</li>
                   @endforeach           
                </ul>
       </small>
        <div class="clearfix"></div>
        @if($errors->any())
        <div class="row border border-danger rounded text-danger" style="margin: 20px;padding: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
       <button type="submit" class="btn btn-primary float-right">Додати </button>    
    </form>
@endsection



