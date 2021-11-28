@extends("layouts.app")
@section('content')
    <div class="text-center">
        Welcome {{ Auth::user()->name }}
    </div>
@endsection
