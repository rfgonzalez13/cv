<?php
class GenerarFichero
{
    //Constructor
    function __construct()
    {
        include './View/Mensaje_View.php';
        include './Model/ExportarFichero_Class.php';
        include './View/FicheroExportado_View.php';
    }

    function exportar()
    {
        session_start();

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
            $usuario = $_SESSION['username'];
            $formato = $_POST['formato'];
            $fechai = $_POST['fechai'];
            $fechaf = $_POST['fechaf'];

            //Creaos el director con los filtros
            $director = new ExportarFicheroCurriculum($usuario, $fechai, $fechaf);
            include './Model/Builder/'.$formato.'Builder.php';
            switch ($formato)
            {
                case "Txt":
                    $builder = new TxtBuilder();
                    break;
                case "Xunta":
                    //new Mensaje("Formato " . $formato . " no implementado aún", './index.php?controller=DatosExportar');
                    $builder = new XuntaBuilder();
                    break;
                break;
                case "Aneca":
                    new Mensaje("Formato " . $formato . " no implementado aún", './index.php?controller=DatosExportar');
                    //$builder = new AnecaBuilder();
                break;
                case "Cityt":
                    new Mensaje("Formato " . $formato . " no implementado aún", './index.php?controller=DatosExportar');
                    //$builder = new CitytBuilder();
                break;
                default:
                    new Mensaje("No fue posible reconocer el formato " . $formato, './index.php?controller=DatosExportar');
            }
            //Especificamos el builder al director
            $director->setBuilder($builder);
            //Lanzamos la creacion del cv, delegando toda responsabilidad al director
            $director->buildCv();
            new FicheroExportado();
        }
        else
        {
            new Mensaje("Necesitas estar indentificado para acceder a esta página", './index.php?controller=Sesion');
        }
    }

}

?>
