@extends("layout")

@section("app-title","Список риб")
@section("page-title","Редагування риб")

@section("page-content")
    <form method="post" action="/type/{{ $type_filter_id }}/fishs/{{$fish->id}}" class="text-left">
        @csrf

        {{method_field("patch")}}
        <div class="form-count">
            @include("includes/input",[
    'fieldId'=>'fish-name','labelText'=>"Им'я типу",
    'placeHolderText'=>"Введіть імя типу ",'fieldValue'=>$fish->nameType
])
        </div>
        <div class="form-count">
            @include("includes/input",[
    'fieldId'=>'fish-count','labelText'=>"Кількість",
    'placeHolderText'=>"Введіть кількість ",'fieldValue'=>$fish->count
])
        </div>
        <div class="form-count">
            <label for="fish-type">Загін</label>
            <select class="browser-default custom-select" name="fish-type" id="fish-type">
                <option selected disabled value="0">
                    Оберіть загін
                </option>
                @foreach($types as $type)
                    <option @if($fish->type->id==$type->id) selected @endif
                    value="{{ $type->id  }}">
                        {{ $type->number }}
                    </option>
                @endforeach
            </select>
            @include('includes/validationErr',['errFieldName'=>'fish-type'])
        </div>
            <button type="submit" class="btn btn-primary float-right">
                Змінити
            </button>
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
                        <p>Підтвердіть видалення риби</p>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    Видалити рибу {{$fish->nameType}} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        Hi
                    </button>
                    <button type="button" class="btn btn-danger" id="delete-fish">
                        Видалити
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (){
           $("#delete-fish").click(function (){
               console.log('fdgdf');
               var id={!! $fish->id !!};
               $.ajax({
                   url:'/type/{{ $type_filter_id }}/fishs/'+id,
                   type:'post',
                   data:{
                       _method:'delete',
                       _token:"{!! csrf_token() !!}"
                   },
                   success:function (msg){
                       location.href="/type/{{ $type_filter_id }}/fishs";
                   }
               });
           }) ;
        });
    </script>
@endsection
