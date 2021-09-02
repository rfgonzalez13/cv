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
        if($result){
            $this->builder->datosPersonales($result);
            $result->free();
        }
        $anhof = date("Y", strtotime($this->fechaf));
        $anhoi = date("Y", strtotime($this->fechai));
        $result = $this->mysqli->query("SELECT p.TituloProy, p.EntidadFinanciadora, p.AnhoInicioProy, p.AnhoFinProy, 
        (SELECT COUNT(1) AS Conteo FROM usuario_proyecto u WHERE u.CodigoProy = p.CodigoProy ) AS Conteo, 
        (SELECT CONCAT(us.NombreU, ' ', us.ApellidosU) FROM usuario us, usuario_proyecto x 
        WHERE x.TipoParticipacionProy = 'Investigador Principal' AND x.CodigoProy = p.CodigoProy AND x.LoginU = us.LoginU LIMIT 1) as NombreU
        FROM proyecto p, usuario_proyecto u WHERE u.CodigoProy = p.CodigoProy 
        AND p.AnhoFinProy BETWEEN " .$anhoi. " AND " .$anhof. " AND u.loginU = '". $this->login ."'");
        $log = $this->mysqli->error;
        echo $log;
        if($result){
            if($result->num_rows > 1){    
                $this->builder->proyectos($result);
            }
            $result->free();
        
        }
        
        $this->builder->getCurriculum();
    }

}

?>

