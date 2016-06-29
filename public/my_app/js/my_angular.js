app.controller('userController' ,function ($scope,$http,$location, API){
	
	$scope.dologin = function () {
		var url = API + 'login';
		var data = $.param($scope.login);
		data.userType = 'normal';
		$http({
			method : 'POST',
			url : url,
			data : data,
			headers : {'Content-Type':'application/x-www-form-urlencoded'}

		})
		.success(function (response) {
			console.log(response);
			$location.href = "/test";
			
		})
		.error(function (response) {
			// console.log(response);
			alert('Xảy ra lỗi vui lòng kiểm tra log');
		});
	}

	$scope.save = function () {
		
		var url = API + 'register';
		var data = $.param($scope.user);
		$http({
			method : 'POST',
			url : url,
			data : data,
			headers : {'Content-Type':'application/x-www-form-urlencoded'}
		})
		.success(function (response) {
			console.log(response);
			// location.reload();
		})
		.error(function (response) {
			console.log(response);
			alert('Xảy ra lỗi vui lòng kiểm tra log');
		});
	}
});