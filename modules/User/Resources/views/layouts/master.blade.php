
<!DOCTYPE html>
<html ng-app="myApp">
<head>
   <title>Englishare - @yield('title')</title>

  <!-- jquery -->
  <script src="{{ asset('/library/jquery/jquery-2.2.4.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('/library/bootstrap/css/bootstrap.min.css') }}">

  <!-- angular -->
  <script src="{{ asset('/library/angular/angular.min.js') }}"></script>
  <script src="{{ asset('/library/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- my-css -->
  <link rel="stylesheet/less" href="{{ asset('/my_app/css/app.less')}}">
  <script src="{{ asset('/library/bootstrap/js/less.min.js')}}"></script>

  <!-- my js -->
  <script src="{{ asset('/my_app/js/app.js')}}"></script>
  <script src="{{ asset('/my_app/js/my_angular.js')}}"></script>

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>

  @yield('content')


</body>
</html>
