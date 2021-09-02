<?php
class DatosExportar
{

    //Constructor
    function __construct()
    {
        include './View/DatosExportar_View.php';
        include './View/Mensaje_View.php';
    }

    function menu()
    {
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
            new DatosExportar_View();
        }
        else
        {
            new Mensaje("Necesitas estar indentificado para acceder a esta página", './index.php?controller=Sesion');
        }
    }

}

?>
