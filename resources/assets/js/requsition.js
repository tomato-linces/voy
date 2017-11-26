



var app = angular.module("tomate", ['ngRoute'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('-_');
        $interpolateProvider.endSymbol('_-');
    });

angular.module("myApp")
.controller("requisition", function($scope) {
    $scope.firstName = "John";
    $scope.lastName = "Doe";
});; 