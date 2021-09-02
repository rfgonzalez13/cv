<?php

include './Model/Access_DB.php';


interface iBuilder{
    
    function crearEstructura();
    function datosPersonales($result);
    function datosAcademicos($result);
    function actividadesAnteriores($result);
    function proyectos($result);
    function publicaciones($result);
    function congresos($result);
    function estancias($result);
    function getCurriculum();
    
}

//Director
class ExportarFicheroCurriculum{

    //ATRIBUTOS
	var $mysqli;
    var $login;
	var $fechai;
	var $fechaf;
    var $builder;

	//METODOS

	function __construct($login, $fechai, $fechaf){
		$this->login = $login;
		$this->fechaf = $fechaf;
		$this->fechai = $fechai;
        $this->mysqli = ConnectDB();
	}

    function setBuilder($builder){
        $this->builder = $builder;
    }

    function buildCv(){
        $this->builder->crearEstructura();
        $result = $this->mysqli->query("SELECT NombreU, ApellidosU, TituloAcademicoU, TipoContratoU, CentroU, DepartamentoU, UniversidadU, TipoU from usuario WHERE loginU = '". $this->login ."'");
        if($result->num_rows == 1){
            $this->builder->datosPersonales($result);
        }
        //resto de funciones
        $this->builder->getCurriculum();
    }

}

?>

