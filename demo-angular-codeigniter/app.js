var routerApp = angular.module('routerApp', ['ui.router']);

routerApp.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/home');

    $stateProvider

        
        .state('home', {
            url: '/home',
            templateUrl: 'partial-home.html',
           
            

        })
    
        
        .state('home.list', {
            url: '/list',
            templateUrl: 'partial-home-list.html',
            controller: function($scope) {
                $scope.peoples = ['Kiet', 'Phung', 'MoMo'];

            }
        })
    
        .state('home.paragraph', {
            url: '/paragraph',
            template: 'I could sure use a drink right now.'

        })
        .state('about',{
            url:'/about',
            templateUrl:'partial-about.html',
            controller:function($scope){
                $scope.stepNumber=0;
                $scope.backgroudColor={"background-color": "red"};

                $scope.changestepNumber = function(newvlaue){
                    $scope.stepNumber = newvlaue;
                }
               
                $scope.plushNumber = function(){
                    $scope.stepNumber = $scope.stepNumber  +1;
                 }
                 $scope.minusNumber = function(){
                    $scope.stepNumber = $scope.stepNumber  -1;
                 }
                 $scope.changebackground = function (){
                     $scope.backgroudColor = {"background-color":"blue"}
                 }
                 $scope.resetcolor= function(value){
                     $scope.backgroudColor= {"background-color":value};
                 }

                 
            }
            // views:{
            //     '':{templateUrl:'partial-about.html'},
            //     'columnOne@about':{template:'this is comn one!'},
            //     'columnTwo@about':{
            //         templateUrl:'table-data.html',
            //         controller:'scotController'
            //     }
            // }

        })
        .state('about.step1',{
            url:'/step1',
            templateUrl:'step1.html'

        })
        .state('about.step2',{
            url:'/step2',
            templateUrl:'step2.html',
            // controller: function ($scope){
            //     $scope.changestepNumber();
            // }
            controller: function ($scope,$http){
                $scope.mangs = [];
                $http.get('http://localhost/demo-angular-codeigniter/index.php/Example_api/user')
                    .then(function(result){
                        $scope.mangs = result.data;
                    });
            }

        })
});
routerApp.controller('scotController',function($scope){
    $scope.scotches = [
        {
            name: 'Ngoc trinh',
            price: 1500
        },
        {
            name:'Chi Pu',
            prive: 2000
        },
        {
            name:'Minh Hang',
            price: 3000
        }
    ];
})
