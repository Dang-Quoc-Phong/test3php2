@extends('layout.main')
@section('content')
<a href="list-task">quay lai</a>
  <form action="post-task" method="POST">

    @if(!empty($msg))
        <div class="alert alert-{{$msg_type}}">{{$msg}}</div>
    @endif
    <label for="">Tim cong viec</label>
    <input type="text" placeholder="Nhap cong viec..." name="name" value="{{!empty($old['name'])? $old['name']:false}}" class="form-control">
    <p style="color: red" >{{!empty($errors['name'])?$errors['name']:false}}</p>


    <button type="submit" class="btn btn-primary">Dong y</button>
  </form>
@endsection
