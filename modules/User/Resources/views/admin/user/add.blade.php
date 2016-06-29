@extends('user::layouts/master')
@section('title', 'User add')
@section('content')


<!-- // Kiểm tra và thông báo lỗi -->
@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Cảnh báo</strong> Có lỗi xảy ra<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="container">
<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 add-user">
    <p> Đây là trang sign up module User // Test thử  </p>
    <p> pingpong </p>
    <h1> Sign Up </h1>

    <!-- form dang ky -->
  <form role="form" action="{{ route('admin.user.getAdd') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"> </input>

    <div class="form-group">
      <label class="control-label "> First Name </label>
      <input class="form-control"  name="txtFirstname" placeholder="Enter Firstname" value="{!! old('txtFirstname')!!}">
      <span class="error"></span> 
    </div>

     <div class="form-group">
      <label class="control-label "> Last Name </label>
      <input class="form-control"  name="txtLastname" placeholder="Enter Lastname" value="{!! old('txtLastname')!!}">
      <span class="error"></span> 
    </div>


    <div class="form-group">
      <label class="control-label "> Email</label>
      <input class="form-control" type="email" name="txtEmail" placeholder="Enter Email" value="{!! old('txtEmail')!!}">
      <span class="error"></span> 
    </div>

    <div class="form-group">
      <label class="control-label "> Password</label>
      <input  type="password" class="form-control" name="txtPassword" placeholder="Enter password" value=" {!! old('txtPassword')!!}">
      <span class="error"></span> 
    </div>

    <div class="form-group">
      <label class="control-label ">Re-Password</label>
      <input  type="password" class="form-control" name="txtRe_Password" placeholder="Enter re-password" value=" {!! old('txtRe_Password')!!}">
      <span class="error"></span> 
    </div>

    <div class="form-group">
      <label class="control-label "> Gender </label>
      <label class="radio-inline">
        <input type="radio" name="optradio">Male
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio">Female
      </label>
    </div>

    <div class="form-group"> 
        <button class="btn-success" type="submit" class="btn btn-default">Register</button>
        <button class="btn-danger" type="reset" class="btn btn-default">Reset</button>
    </div>
  </form>
</div>
</div>
@endsection