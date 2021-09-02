<?php

class TxtBuilder implements iBuilder{
    
    //ATRIBUTOS
    var $path;
    var $archivo;
    var $curriculum;

    function crearEstructura()
    {
        $this->path = '/Model/Builder/Plantillas/Txt/';
        $this->curriculum = tempnam(getcwd(), 'CV');
        $this->archivo = fopen($this->curriculum, 'w');
        $str = file_get_contents(getcwd() . $this->path . 'cabecera.txt');
        fwrite($this->archivo, $str);
    }
    function datosPersonales($result)
    {
        //NombreU, ApellidosU, TituloAcademicoU, TipoContratoU, CentroU, DepartamentoU, UniversidadU, TipoU
        $reemplazo =  array( "NombreU" => "{{NombreU}}",
            "ApellidosU" => "{{ApellidosU}}",
            "TituloAcademicoU" => "{{TituloAcademicoU}}",
            "TipoContratoU" => "{{TipoContratoU}}",
            "CentroU" => "{{CentroU}}",
            "DepartamentoU" => "{{DepartamentoU}}",
            "UniversidadU" => "{{UniversidadU}}",
            "TipoU" => "{{TipoU}}"
            );
        $fila = $result->fetch_array(MYSQLI_ASSOC);        
        //Leer la plantilla
        $str=file_get_contents(getcwd() . $this->path . 'datospersonales.txt');
        //remplazar
        $str=str_replace($reemplazo, $fila,$str);
        //Concatenar
        fwrite($this->archivo, $str);
        
    }
    function datosAcademicos($result)
    {
        
    }
    function actividadesAnteriores($result)
    {
        
    }

    function proyectos($result)
    {
        //CodigoProy, TituloProy, EntidadFinanciadora, AcronimoProy, AnhoInicioProy, AnhoFinProy, Importe 
        $reemplazo = array('{{TituloProy}}', '{{EntidadFinanciadora}}', '{{AnhoInicioProy}}', 
        '{{AnhoFinProy}}', '{{NumeroU}}','{{NombreU}}', '{{ApellidosU}}');
        //Concatenar Título
        $str=file_get_contents(getcwd() . $this->path . 'proyectoscab.txt');
        fwrite($this->archivo, $str);
        //for each en result
        $fila = $result->fetch_array(MYSQLI_ASSOC);
        while($fila != null){
            //Leer la plantilla
            $str=file_get_contents(getcwd() . $this->path . 'proyectos.txt');
            //remplazar
            $str=str_replace($reemplazo, $fila,$str);
            //Concatenar
            fwrite($this->archivo, $str);
            $fila = $result->fetch_array(MYSQLI_ASSOC);
        } 
    }
    function publicaciones($result)
    {
        
    }
    function congresos($result)
    {
        
    }
    function estancias($result)
    {
        
    }
    function getCurriculum()
    {
        fclose($this->archivo);

        session_start(); 
        $_SESSION['filename'] = $this->curriculum;
        $_SESSION['type'] = 'text/plain';
        $_SESSION['outputname'] = 'TXT_Curriculum.txt';

    }

}
?>