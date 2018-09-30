var routerApp = angular.module('routerApp', ['ui.router']);
routerApp.config(function($stateProvider, $urlRouterProvider){
    // $urlRouterProvider.otherwise('/theloai');
    $stateProvider 
        .state('theloai',{
            url: '/theloai',
            templateUrl:'theloai.html'
        })
        .state('theloai.danhsach',{
            url: '/danhsach',
            templateUrl:'danhsachtheloai.html',
            controller: function ($scope,$http){
                $http.get("dataurl")
                    .then(function(data){
                        $scope.theloai = data.data;
                    })
            }
        })
        .state('loaitin',{
            url:'/loaitin',
            templateUrl:'loaitin.html'
        })
        .state('tintuc',{
            url:'/tintuc',
            templateUrl:'tintuc.html'
        })
        .state('user',{
            url:'/user',
            templateUrl:'user.html'
        })
});