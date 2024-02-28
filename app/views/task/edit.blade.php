@extends('layout.main')
@section('content')
<a href="{{BASE_URL}}list-task">quay lai</a>
  <form action="{{BASE_URL}}edit-post/{{$taskDetail->id}}" method="POST">

    @if(!empty($msg))
        <div class="alert alert-{{$msg_type}}">{{$msg}}</div>
    @endif
    <label for="">Sua cong viec</label>
    <input type="text" placeholder=" Nhap cong viec..." name="name" value="{{$taskDetail->name}}" class="form-control">
    <p style="color: red" >{{!empty($errors['name'])?$errors['name']:false}}</p>



    <button type="submit" class="btn btn-primary">Dong y</button>
  </form>
@endsection
