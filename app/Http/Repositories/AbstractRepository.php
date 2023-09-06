<?php

namespace App\Http\Repositories;

abstract class AbstractRepository{
  public function __construct($model){
    $this->model = $model;
  }

  public function selectAtributosRegistrosRelacionados($atributos){
    $this->model = $this->model->with($atributos);
  }

  public function filtro($filtros){
    $filtros = explode(';', $filtros);
    
    foreach($filtros as $filtro){
        $condicoes = explode(':', $filtro);
        $this->model = $this->model->where($condicoes[0],$condicoes[1],$condicoes[2]);
    }   
  }

  public function selectAtributos($atributos){
    $this->model = $this->model->selectRaw($atributos);
  }

  public function getResultado(){
    return $this->model->get();
  }

  public function getResultadoPaginado($n){
    return $this->model->paginate($n);
  }
}



?>