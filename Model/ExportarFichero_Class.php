<?php

include './Model/Access_DB.php';


interface iBuilder{
    
    function crearEstructura();
    function datosPersonales($result);
    function datosAcademicos($result);
    function actividadesAnteriores($result);
    function proyectos($result);
    function publicaciones($libros, $articulos);
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
        if($result){
            if($result->num_rows > 1){    
                $this->builder->proyectos($result);
            }
            $result->free();
        
        }
        $libros = $this->mysqli->query("SELECT l.AutoresL, l.TituloL, l.ISBN, l.PagIniL, l.PagFinL, l.VolumenL, l.EditorialL, l.FechaPublicacionL, l.PaisEdicionL 
        FROM libro l, usuario_libro u 
        WHERE u.CodigoL = l.CodigoL
        AND l.FechaPublicacionL BETWEEN '".$this->fechai."' AND '".$this->fechaf."' 
        AND u.loginU = '". $this->login ."'");
        $publicaciones = 0;
        if($libros){
            $publicaciones += $libros->num_rows;
        }else{
            $libros = null;
        }
        $articulos =  $this->mysqli->query("SELECT a.AutoresA, a.TituloA, a.TituloR, a.ISSN, a.VolumenR, a.PagIniA, a.PagFinA, a.FechaPublicacionR 
        FROM articulo a, usuario_articulo u 
        WHERE u.CodigoA = a.CodigoA 
        AND a.FechaPublicacionR BETWEEN '".$this->fechai."' AND '".$this->fechaf."'
        AND a.EstadoA = 'Publicado' AND u.loginU = '". $this->login ."'");
        if($articulos){
            $publicaciones += $articulos->num_rows;
        }else{
            $articulos = null;
        }
        if($publicaciones > 1){
            $this->builder->publicaciones($libros, $articulos);
        }


        $this->builder->getCurriculum();
    }

}

?>

