<?php

include './Model/Access_DB.php';


interface iBuilder{
    
    function crearEstructura();
    function datosPersonales($result);
    function datosAcademicos($result);
    function actividadesAnteriores($result);
    function proyectos($result);
    function publicaciones($libros, $articulos);
    function congresos($congresos,$ponencias);
    function estancias($result);
    function TAD($result);
    function getCurriculum();
    
}

//Director
class ExportarFicheroCurriculum{

    //ATRIBUTOS (Conextion a la BD, Filtros de tiempo, builder y usuario solicitante)
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

    //Crea un CV en base a los filtros de la fecha inicial y final pasados en el formulario
    function buildCv(){
        
        //Estructura (Cabecera)
        $this->builder->crearEstructura();
        
        //Datos personales
        $result = $this->mysqli->query("SELECT NombreU, ApellidosU, TituloAcademicoU, TipoContratoU, CentroU, DepartamentoU, UniversidadU, TipoU from usuario WHERE loginU = '". $this->login ."'");
        if($result){
            $this->builder->datosPersonales($result);
            $result->free();
        }
        
        //Proyectos
        $anhof = date("Y", strtotime($this->fechaf));
        $anhoi = date("Y", strtotime($this->fechai));
        //Sentencia SQL que recoje los datos basicos del proyecto + el nº de investigadores (desde la BD) + el Investigador Principal (si existe en BD)
        $result = $this->mysqli->query("SELECT p.TituloProy, p.EntidadFinanciadora, p.AnhoInicioProy, p.AnhoFinProy, 
        (SELECT COUNT(1) AS Conteo FROM usuario_proyecto u WHERE u.CodigoProy = p.CodigoProy ) AS Conteo, 
        (SELECT CONCAT(us.NombreU, ' ', us.ApellidosU) FROM usuario us, usuario_proyecto x 
        WHERE x.TipoParticipacionProy = 'Investigador Principal' AND x.CodigoProy = p.CodigoProy AND x.LoginU = us.LoginU LIMIT 1) as NombreU
        FROM proyecto p, usuario_proyecto u WHERE u.CodigoProy = p.CodigoProy 
        AND p.AnhoFinProy BETWEEN " .$anhoi. " AND " .$anhof. " AND u.loginU = '". $this->login ."'");
        if($result){
            if($result->num_rows >= 1){    
                $this->builder->proyectos($result);
            }
            $result->free();
        
        }
        
        //Publicaciones (Libros y Articulos)
        //SQL de libros con los filtros aplicados
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
        //Y lo mismo para articulos
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
        //Si las anteriores consultas devolvieron entre las dos más de una publicacion
        if($publicaciones >= 1){
            $this->builder->publicaciones($libros, $articulos);
        }
        
        //Estancias
        /*
            SQL que devuelve datos básicos de la estancia y la diferencia en días (duración de la estancia)
            Filtros los habituales de fecha y ademas que la duracion sea > 30 dias
        */
        $result = $this->mysqli->query("SELECT e.CentroE, e.UniversidadE, e.PaisE, e.FechaInicioE, 
        ROUND(DATEDIFF(e.FechaFinE, e.FechaInicioE)/7, 1) as DuracionE, e.TipoE 
        FROM estancia e 
        WHERE e.FechaFinE BETWEEN '".$this->fechai."' AND '".$this->fechaf."'
        AND DATEDIFF(e.FechaFinE, e.FechaInicioE) > 30
        AND e.loginU = '". $this->login ."'");
        if($result){
            if($result->num_rows >= 1){    
                $this->builder->estancias($result);
            }
            $result->free();
        }

        //Congresos y Ponencias
        /*
            SQL con los datos básicos del congreso + lista de AUTORES (AutoresC)
            AutoresC: Usuarios participantes en dicho congreso guardados en la tabla usuario_congreso           
        */
        $congresos = $this->mysqli->query("SELECT x.AutoresC, c.NombreC, u.TipoParticipacionC, c.AcronimoC, c.AnhoC, c.LugarC 
        FROM congreso c, usuario_congreso u,
            (SELECT GROUP_CONCAT(CONCAT(us.NombreU, ' ', us.ApellidosU) SEPARATOR ', ') as AutoresC, u.CodigoC 
            FROM usuario_congreso u, usuario us WHERE u.LoginU = us.LoginU GROUP BY u.CodigoC) x 
        WHERE x.CodigoC = c.CodigoC 
        AND u.CodigoC = c.CodigoC
        AND c.AnhoC BETWEEN " .$anhoi. " AND " .$anhof. " AND u.loginU = '". $this->login ."'");
        $num_congresos = 0;
        if($congresos){
            $num_congresos += $congresos->num_rows;
        }else{
            $congresos = null;
        }
        // Una SQL más sencilla para las ponencias
        $ponencias = $this->mysqli->query("SELECT p.AutoresP, p.TituloP, p.CongresoP, p.FechaIniCP, p.LugarCP 
        FROM ponencia p, usuario_ponencia u 
        WHERE p.CodigoP = u.CodigoP 
        AND p.FechaIniCP BETWEEN '".$this->fechai."' AND '".$this->fechaf."'
        AND u.loginU = '". $this->login ."'");
        if($ponencias){
            $num_congresos += $ponencias->num_rows;
        }else{
            $ponencias = null;
        }
        if($num_congresos >= 1){
            $this->builder->congresos($congresos, $ponencias);
        }
        
        //TAD
        $result = $this->mysqli->query("SELECT t.TituloTAD, t.AlumnoTAD, t.FechaLecturaTAD 
        FROM tad t 
        WHERE t.FechaLecturaTAD BETWEEN '".$this->fechai."' AND '".$this->fechaf."'
        AND t.loginU = '". $this->login ."'");
        if($result){
            if($result->num_rows >= 1){    
                $this->builder->TAD($result);
            }
            $result->free();        
        }

        //Cierra y set de parametros para exportar (download.php)
        $this->builder->getCurriculum();
    }

}

?>

