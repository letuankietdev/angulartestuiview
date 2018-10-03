var routerApp = angular.module('routerApp', ['ui.router']);
'use strict';
routerApp.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/home');

    $stateProvider


        .state('home', {
            url: '/home',
            templateUrl: 'partial-home.html',



        })


        .state('home.list', {
            url: '/list',
            templateUrl: 'partial-home-list.html',
            controller: function ($scope) {
                $scope.peoples = ['Kiet', 'Phung', 'MoMo'];

            }
        })

        .state('home.paragraph', {
            url: '/paragraph',
            template: 'I could sure use a drink right now.'

        })
        .state('about', {
            url: '/about',
            templateUrl: 'partial-about.html',
            controller: function ($scope) {
                $scope.stepNumber = 0;
                $scope.backgroudColor = { "background-color": "red" };

                $scope.changestepNumber = function (newvlaue) {
                    $scope.stepNumber = newvlaue;
                }

                $scope.plushNumber = function () {
                    $scope.stepNumber = $scope.stepNumber + 1;
                }
                $scope.minusNumber = function () {
                    $scope.stepNumber = $scope.stepNumber - 1;
                }
                $scope.changebackground = function () {
                    $scope.backgroudColor = { "background-color": "blue" }
                }
                $scope.resetcolor = function (value) {
                    $scope.backgroudColor = { "background-color": value };
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
        .state('about.step1', {
            url: '/step1',
            templateUrl: 'step1.html',
            controller: function ($scope) {
                $scope.getdata = function ($scope, $http) {

                    $http.get('http://localhost/demo-angular-codeigniter/index.php/Example_api/user')
                        .then(function (result) {
                            $scope.mangs = result.data;
                        });
                }
                // $scope.insert = function (data) {
                //     $http.post('http://localhost/demo-angular-codeigniter/index.php/Example_api/user', {
                //         "data": data.name, "email": data.email, "password": data.password, "quyen": data.quyen
                //     }).success(function (db) {
                //         if (db == true) {
                                                                                                        
                //         }

                //     });
                // }
                $scope.addUser = function (name, email, password, quyen,$http) {
                    // alert("asdasda");
                    $http.post("http://localhost/demo-angular-codeigniter/index.php/Example_api/addUser", {
                        'name': name, 'email': email, 'password': password, 'quyen': quyen
                    }).success(function (response) { $scope.answer = response })
                        .error(function (response) {
                            alert('error');
                            $scope.answer = response;
                        });
                };

            }

        })
        .state('about.step2', {
            url: '/step2',
            templateUrl: 'step2.html',
            // controller: function ($scope){
            //     $scope.changestepNumber();
            // }
            controller: function ($scope, $http) {

                $http.get('http://localhost/demo-angular-codeigniter/index.php/Example_api/user')
                    .then(function (result) {
                        $scope.mangs = result.data;
                    });
                $scope.buttonText = "EDIT";
                $scope.typebutton = "btn btn-info";
                $scope.checked = {};

                $scope.edit = function (id, value) {
                    if(value === undefined) value = true;
                    $scope.checked[id] = value;
                    // alert($scope.mangs.length);
                    // for(var i=0 ; i< $scope.mangs.length; i++){
                    //        if($scope.mangs[i]){
                    //            alert(i);
                    //        }
                    // }
                }
                $scope.save = function (data) {

                   


                  
                    var config = {
                        headers: {
                            "Content-Type": "application/json",
                            

                        }
                    }
                    $http.post("http://localhost/demo-angular-codeigniter/index.php/Example_api/user", data)
                        .success(function () {
                            // $scope.PostDataResponse = data;
                            console.log(data.id);
                            alert("Update success");
                            $scope.checked = {};

                        })
                        .error(function (data, status, header, config) {
                            // $scope.ResponeseDetails = "Data: " + data +
                            //     "<hr /> status:" + status +
                            //     "<hr /> headers:" + header +
                            //     "<hr /> config:" + config;
                        })








                }
                $scope.cancel = function (id) {
                    delete $scope.checked[id]
                }

            }



        })
});
routerApp.controller('scotController', function ($scope) {
    $scope.scotches = [
        {
            name: 'Ngoc trinh',
            price: 1500
        },
        {
            name: 'Chi Pu',
            prive: 2000
        },
        {
            name: 'Minh Hang',
            price: 3000
        }
    ];
})
