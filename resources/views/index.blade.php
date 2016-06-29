
<!DOCTYPE html>
<html ng-app="myApp">
<head>
  <title>Laravel</title>

  <!-- jquery -->
  <script src="{{ asset('/library/jquery/jquery-2.2.4.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('/library/bootstrap/css/bootstrap.min.css') }}">

  <!-- angular -->
  <script src="{{ asset('/library/angular/angular.min.js') }}"></script>
  <script src="{{ asset('/library/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- my-css -->
  <link rel="stylesheet" href="{{ asset('/my_app/css/app.less')}}">
  <script src="{{ asset('/library/bootstrap/js/less.min.js')}}"></script>

  <!-- my js -->
  <script src="{{ asset('/my_app/js/app.js')}}"></script>
  <script src="{{ asset('/my_app/js/my_angular.js')}}"></script>

</head>
<body>
  <div class="container">
    <div class="content">
      <img src="my_app/images/logo2.png">
      <h1> Trang Home </h1>
      <div class="title">Laravel 5</div>
    </div>
    <!-- test bootstrap -->
    <form role="form">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd">
      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>

      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <!-- test angular -->
    <br> <br>
    <div>
      <p>Name : <input type="text" ng-model="name"></p>
      <h1>Hello <% 5 + 5 %> </h1>
    </div>

  </div>
</body>
</html>
