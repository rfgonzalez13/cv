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
        '{{AnhoFinProy}}', '{{NumeroU}}','{{NombreU}}');
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
    function publicaciones($libros, $articulos)
    {
       //Concatenar Título
       $str=file_get_contents(getcwd() . $this->path . 'publicacionescab.txt');
       fwrite($this->archivo, $str);
       if($libros != null){
            //AutoresL, TituloL, ISBN, PagIniL, PagFinL, VolumenL, EditorialL, FechaPublicacionL, PaisEdicionL    
            $reemplazo = array('{{AutoresL}}', '{{TituloL}}', '{{ISBN}}', '{{PagIniL}}', '{{PagFinL}}', 
            '{{VolumenL}}', '{{EditorialL}}', '{{FechaPublicacionL}}', '{{PaisEdicionL}}');
            $fila = $libros->fetch_array(MYSQLI_ASSOC);
            while($fila != null){
                //Leer la plantilla
                $str=file_get_contents(getcwd() . $this->path . 'libros.txt');
                //remplazar
                $str=str_replace($reemplazo, $fila,$str);
                //Concatenar
                fwrite($this->archivo, $str);
                $fila = $libros->fetch_array(MYSQLI_ASSOC);
            } 
       }
       if($articulos != null){
        //AutoresA, TituloA, TituloR, ISSN, VolumenR, PagIniA, PagFinA, FechaPublicacionR 
        $reemplazo = array('{{AutoresA}}', '{{TituloA}}', '{{TituloR}}', '{{ISSN}}', '{{VolumenR}}',
         '{{PagIniA}}', '{{PagFinA}}', '{{FechaPublicacionR}}');
        $fila = $articulos->fetch_array(MYSQLI_ASSOC);
        while($fila != null){
            //Leer la plantilla
            $str=file_get_contents(getcwd() . $this->path . 'articulos.txt');
            //remplazar
            $str=str_replace($reemplazo, $fila,$str);
            //Concatenar
            fwrite($this->archivo, $str);
            $fila = $articulos->fetch_array(MYSQLI_ASSOC);
        } 
   }  
    }
    function congresos($congresos, $ponencias)
    {
        //Concatenar Título
        $str=file_get_contents(getcwd() . $this->path . 'congresocab.txt');
        fwrite($this->archivo, $str);
        if($congresos != null){
            //AutoresC, NombreC, TipoParticipacionC, AcronimoC, AnhoC, LugarC 
            $reemplazo = array('{{AutoresC}}', '{{NombreC}}', '{{TipoParticipacionC}}', 
            '{{AcronimoC}}', '{{AnhoC}}','{{LugarC}}');
            //for each en result
            $fila = $congresos->fetch_array(MYSQLI_ASSOC);
            while($fila != null){
                //Leer la plantilla
                $str=file_get_contents(getcwd() . $this->path . 'congreso.txt');
                //remplazar
                $str=str_replace($reemplazo, $fila,$str);
                //Concatenar
                fwrite($this->archivo, $str);
                $fila = $congresos->fetch_array(MYSQLI_ASSOC);
            } 
        }
        if($ponencias != null){
            //AutoresP, TituloP, CongresoP, FechaIniCP, LugarCP
            $reemplazo = array('{{AutoresP}}', '{{TituloP}}', 
            '{{CongresoP}}', '{{FechaIniCP}}','{{LugarCP}}');
            //for each en result
            $fila = $ponencias->fetch_array(MYSQLI_ASSOC);
            while($fila != null){
                //Leer la plantilla
                $str=file_get_contents(getcwd() . $this->path . 'ponencia.txt');
                //remplazar
                $str=str_replace($reemplazo, $fila,$str);
                //Concatenar
                fwrite($this->archivo, $str);
                $fila = $ponencias->fetch_array(MYSQLI_ASSOC);
            } 
        }
    }
    function estancias($result)
    {
        //CentroE, UniversidadE, PaisE, FechaInicioE, DuracionE, TipoE
        $reemplazo = array('{{CentroE}}', '{{UniversidadE}}', '{{PaisE}}', 
        '{{FechaInicioE}}', '{{DuracionE}}','{{TipoE}}');
        //Concatenar Título
        $str=file_get_contents(getcwd() . $this->path . 'estanciacab.txt');
        fwrite($this->archivo, $str);
        //for each en result
        $fila = $result->fetch_array(MYSQLI_ASSOC);
        while($fila != null){
            //Cambiar TipoE acorde al formato TXT
            switch($fila['TipoE']){
                case 'Doctorado':
                    $fila['TipoE'] = 'D';
                    break;
            
                case 'Invitado':
                    $fila['TipoE'] = 'I';
                    break;

                default:
                    $fila['TipoE'] = "O (".$fila['TipoE'].")";
                
            }
            //Leer la plantilla
            $str=file_get_contents(getcwd() . $this->path . 'estancias.txt');
            //remplazar
            $str=str_replace($reemplazo, $fila,$str);
            //Concatenar
            fwrite($this->archivo, $str);
            $fila = $result->fetch_array(MYSQLI_ASSOC);
        } 
    }

    function TAD($result){
        //Concatenar Título
        $str=file_get_contents(getcwd() . $this->path . 'tadcab.txt');
        fwrite($this->archivo, $str);
        //TituloTAD, AlumnoTAD, FechaLecturaTAD
        $reemplazo = array('{{TituloTAD}}', '{{AlumnoTAD}}', 
            '{{FechaLecturaTAD}}');
        //for each en result
        $fila = $result->fetch_array(MYSQLI_ASSOC);
        while($fila != null){
            //Leer la plantilla
            $str=file_get_contents(getcwd() . $this->path . 'tad.txt');
            //remplazar
            $str=str_replace($reemplazo, $fila,$str);
            //Concatenar
            fwrite($this->archivo, $str);
            $fila = $result->fetch_array(MYSQLI_ASSOC);
        }
    }

    function getCurriculum()
    {
        $str=file_get_contents(getcwd() . $this->path . 'fin.txt');
        fwrite($this->archivo, $str);
        fclose($this->archivo);

        session_start(); 
        $_SESSION['filename'] = $this->curriculum;
        $_SESSION['type'] = 'text/plain';
        $_SESSION['outputname'] = 'TXT_Curriculum.txt';

    }

}
?>