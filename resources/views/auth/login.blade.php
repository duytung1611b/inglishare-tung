@extends('layouts/master')
@section('title', 'Login')
@section('content')


<!-- // Kiểm tra và thông báo lỗi -->
{{-- @if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Cảnh báo</strong> Có lỗi xảy ra<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif --}}
<div class="container">
<div class="login" ng-controller="userController">
<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 add-user">
    <h1> Login </h1>
    <div class="login-fb">
      <p> Sign in to take advantage of our advance features and to create  your own playfull content! </p>

      <a class="facebook" href="#"> <i class="fa fa-facebook-f"></i> Sign in with Facebook </a>
      <a class="google" href="#"> <i class="fa fa-google-plus"></i></i>Sign in with Facebook </a>
    </div>

   <form name="formlogin">

    <div class="form-group">
      <label class="control-label "> Email</label>
      <input class="form-control" type="email" name="email" ng-model="login.email" required="true" placeholder="Enter Email" value="{!! old('email')!!}">
      <span class="error"></span> 
    </div>

    <div class="form-group">
      <label class="control-label "> Password</label>
      <input  type="password" class="form-control" name="password" ng-model="login.password" placeholder="Enter password" value=" {!! old('txtPassword')!!}">
      <span class="error"></span> 
    </div>

    
    <div class="form-group"> 
        <button type="button" class="btn btn-primary" ng-click="dologin()">Login</button>
      
    </div>
  </form>
</div>
</div>
</div>
@endsection