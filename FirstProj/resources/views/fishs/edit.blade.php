@extends("layout")

@section("app-title","Список риб")
@section("page-title","Редагування риб")

@section("page-content")
    <form method="post" action="/fishs/{{$fish->id}}" class="text-left">
        @csrf

        {{method_field("patch")}}
        <div class="form-count">
            <label for="fish-name">
                Тип риби
            </label>
            <input type="text" class="form-control {{$errors->has('nameType') ? 'is-invalid':''}}" name="nameType" id="fish-name" placeholder="Ведіть тип" value="{{ old('nameType') ? ('nameType'):$fish->nameType}}">
        <small class="form-text text-danger">
            <ul>
                @foreach($errors->get('nameType') as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </small>
        </div>
        <div class="form-count">
            <label for="fish-count">Кількість</label>
            <input type="text" class="form-control {{$errors->has('count') ? 'is-invalid':''}}" name="count" id="fish-count" placeholder="Кількість" value="{{ old('count') ? old('count') :$fish->count}}">
            <small class="form-text text-danger">
                <ul>
                    @foreach($errors->get('count') as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </small>
            <button type="submit" class="btn btn-primary float-right">
                Змінити
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                Видалити
            </button>
        </div>
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
                   url:'/fishs/'+id,
                   type:'post',
                   data:{
                       _method:'delete',
                       _token:"{!! csrf_token() !!}"
                   },
                   success:function (msg){
                       location.href="/fishs";
                   }
               });
           }) ;
        });
    </script>
@endsection
