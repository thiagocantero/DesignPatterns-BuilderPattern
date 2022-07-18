<?php



abstract class AbstrataVeiculoBuilder {
    abstract function getVeiculo();
}

abstract class AbstrataVeiculoDiretor {
    abstract function __construct(AbstrataVeiculoBuilder $builder_in);
    abstract function buildVeiculo();
    abstract function getVeiculo();
}

class Veiculo {
    private $veiculo  = NULL;
    private $marca    = NULL;
    private $modelo   = NULL;
    private $motor    = NULL;
    private $ano      = NULL;
    
    function __construct() {
    }
    
    function showVeiculo() {
      return $this->veiculo;
    }
    
    function setMarca($marca_in) {
      $this->marca = $marca_in;
    }

    function setModelo($modelo_in){
      $this->modelo = $modelo_in;
    }
    
    function setMotor($motor_in) {
      $this->motor = $motor_in;
    }
    
    function setAno($ano_in) {
      $this->ano .= $ano_in;
    }
    
    function formaVeiculo() {
       $this->veiculo  = '<html>';
       $this->veiculo .= '<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><title>Desgin Pattern Builder PHP</title></head>';
       $this->veiculo .= '<body>';
       $this->veiculo .= '<table class ="table">';
       $this->veiculo .= '<thead>';
       $this->veiculo .= '<tr>';
       $this->veiculo .= '<th scope="col">Marca</th>';
       $this->veiculo .= '<th scope="col">Modelo</th>';
       $this->veiculo .= '<th scope="col">Motor</th>';
       $this->veiculo .= '<th scope="col">Ano</th>';
       $this->veiculo .= '</tr>';
       $this->veiculo .= '</thead>';
       $this->veiculo .= '<tbody>';
       $this->veiculo .= '<tr>';
       $this->veiculo .= '<td>'.$this->marca.'</td>';
       $this->veiculo .= '<td>'.$this->modelo.'</td>';
       $this->veiculo .= '<td>'.$this->motor.'</td>';
       $this->veiculo .= '<td>'.$this->ano.'</td>';
       $this->veiculo .= '</tr>';
       $this->veiculo .= '</tbody>';
       $this->veiculo .= '</table>';
       $this->veiculo .= '</body>';
       $this->veiculo .= '</html>';
    }
}
class VeiculoBuilder extends AbstrataVeiculoBuilder {
    
    private $veiculo = NULL;
    
    function __construct() {
      $this->veiculo = new Veiculo();
    }
    
    function setMarca($marca_in) {
      $this->veiculo->setMarca($marca_in);
    }
    
    function setModelo($modelo_in) {
      $this->veiculo->setModelo($modelo_in);
    }
    
    function setMotor($motor_in) {
      $this->veiculo->setMotor($motor_in);
    }
    
    function setAno($ano_in){
        $this->veiculo->setAno($ano_in);
    }

    function formaVeiculo() {
      $this->veiculo->formaVeiculo();
    }
    
    function getVeiculo() {
      return $this->veiculo;
    }
}
class VeiculoDiretorBuilder extends AbstrataVeiculoDiretor {
    private $builder = NULL;
    public function __construct(AbstrataVeiculoBuilder $builder_in) {
         $this->builder = $builder_in;
    }
    public function buildVeiculo() {
      $this->builder->setMarca('Hyundai');
      $this->builder->setModelo('HB20');
      $this->builder->setMotor('1.0');
      $this->builder->setAno('2018');
      $this->builder->formaVeiculo();
    }
    public function getVeiculo() {
      return $this->builder->getVeiculo();
    }
}

//   writeln('BEGIN TESTING BUILDER PATTERN');
//   writeln('');

  $veiculoBuilder = new VeiculoBuilder();
  $veiculoDiretor = new VeiculoDiretorBuilder($veiculoBuilder);
  $veiculoDiretor->buildVeiculo();
  $veiculo = $veiculoDiretor->getVeiculo();
  writeln($veiculo->showVeiculo());
  writeln('');
 
//   writeln('END TESTING BUILDER PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }
