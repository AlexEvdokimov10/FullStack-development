@extends("layout")

@section("app-title","Загін")
@section("page-title","Редагування загінів риб")

@section("page-content")
    <form method="post" action="/types/{{ $type->id }}" class="text-left">
        @csrf
        @method("patch")

        <div class="form-count">
            @include("includes/input",['fieldId'=>'number',
'labelText'=>'Номер загіну','placeHolderText'=>'Введіть номер','fieldValue'=>$type->number])
        </div>
        <div class="form-count">
            @include("includes/input",['fieldId'=>'squad','labelText'=>'Спеціальність','placeHolderText'=>'Назва загіну','fieldValue'=>$type->squad])
        </div>

        <div class="form-count">
            <label for="fish">
                Загін
            </label>
            <select class="browser-default custom select " name="fish_id" id="fish">
                <option disabled value="0">
                    Оберіть рибу
                </option>
                @foreach($fishs as $fish)
                    <option @if($type->fish->id==$fish->id) selected @endif
                    value="{{ $fish->id  }}"> {{$fish->nameType}} </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary float-right"> Змінити </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
            Видалити
        </button>
    </form>

    <!--Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">
                        <p>Підтвердіть видалення загіну</p>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    Видалити загін {{$type->number}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        Hi
                    </button>
                    <button type="button" class="btn btn-danger" id="delete-type">
                        Видалити
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (){
            $("#delete-type").click(function (){

                var id={!! $type->id !!};
                $.ajax({
                    url:'/types/'+id,
                    type:'post',
                    data:{
                        _method:'delete',
                        _token:"{!! csrf_token() !!}"
                    },
                    success:function (msg){
                        location.href="/types";
                    }
                });
            }) ;
        });
    </script>
@endsection
