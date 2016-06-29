var app = angular.module('myApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}).constant('API', 'http://inglishshare.demo.siten.vn2/api/users/');

// app.config(['$routeProvider', '$locationProvider',
//     function($routeProvider, $locationProvider) {
//         $routeProvider.when('/api/users/login', {
//             templateUrl: '../views/auth/login.blade.html',
//             controller: 'userController'
//         });

//         $routeProvider.when('/api/users/test', {
//             templateUrl: '../views/layouts/index.blade.html',
//             controller: 'userController'
//             // authenticated: true
//         });

//         // $routeProvider.when('/logout', {
//         //     templateUrl: '../templates/users/logout.html',
//         //     controller: 'userController'
//         //     // authenticated: true
//         // });

//         $routeProvider.otherwise('/');
//     }
// ]);

