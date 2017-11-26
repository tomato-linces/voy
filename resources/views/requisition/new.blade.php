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
      $scope.requis = [];
      $scope.actual = "";
      $scope.cantidad =0;

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
      $scope.showRequi=function(val){
        console.log(val)
        $scope.actual=val;
        $("#myModal").modal();
      }
      $scope.addRequi=function(val){
        $scope.requis.push({product:val,cantidad:$scope.cantidad});
        $scope.cantidad = 0;
        $('#myModal').modal('toggle');
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
        <div  ng-click = showRequi(product)>
          <h3>Nombre:-_product.nombre_-</h3>
          <p>Descripciòn:-_product.descripcion_-</p>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <div class = "container">
    <div class = "row">
    <div class = "col-sm-12">
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat = "requi in requis">
          <td>-_requi.product.nombre_-</td>
          <td>-_requi.cantidad_-</td>
          <td><button type="button" class="close" data-dismiss="modal" ng-click="eliminarRequi(requi)">&times;</button></td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
  <button type="button" class="btn btn-info btn-lg" >Finalizar linea</button>
  </div>
  
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" >&times;</button>
          <h4 class="modal-title">Producto a comprar</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <h1>
                -_ actual.nombre_-
              </h1>
              <p>-_actual.descripcion_-</p>
            </div>
            <div class="col-sm-6">
              <h1>cantidad:</h1><br>
              <input type="number" name="" ng-model="cantidad" min=0>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-default" ng-click= "addRequi(actual)" >Agregar</button>
        </div>
      </div>

    </div>
  </div>
  </div>

</div>
@endsection
