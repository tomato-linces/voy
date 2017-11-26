@extends('layouts.app')

@section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script>
  var app = angular.module("tomate", [], function($interpolateProvider) {
          $interpolateProvider.startSymbol('-_');
          $interpolateProvider.endSymbol('_-');
      });

  var app = angular.module("tomate");
  app.controller("requisition", function($scope,$http) {
      $scope.h = "hola";
      $scope.cargarProductos = function(){
        $http.get("/product")
        .success(function(data){
          console.log(data);
            $scope.products =  data;
        })
        .error(function(data){
          console.log(data);
        });    
      }
      $scope.cargarProductos();
  });
</script>
<div ng-controller = "requisition">
  <div class="jumbotron text-center">
    <h1>Nueva Linea de Requisicion</h1>
    <p>Elije los productos a comprar.. y preciona finalizar para comprarlos</p> 
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-4" ng-repeat = "product in products">
        <h3>Nombre:-_product.nombre_-</h3>
        <p>Descripciòn:-_product.descripcion_-</p>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
