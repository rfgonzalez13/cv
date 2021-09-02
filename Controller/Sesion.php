<?php
class SESION
{

    //Constructor
    function __construct()
    {
        include './View/Sesion_View.php';
        session_start();
    }

    function menu()
    {

        new Sesion_View();

    }

    function verificar()
    {

        session_start();
        include './Model/Access_DB.php';
        include './View/Mensaje_View.php';
        include './View/DatosExportar_View.php';

        //Connect a la base de datos
        $mysqli = ConnectDB();

        //Obtenemos los datos mediante un petición POST
        $user = $_POST['username'];
        $pass = $_POST['password'];

        //Buscamos al usuario y su contraseña
        $result = $mysqli->query("SELECT * FROM usuario WHERE LoginU='" . $user . "' AND PasswordU='" . md5($pass) . "'");
        //Buscamos si existe el usuario
        $result2 = $mysqli->query("SELECT * FROM usuario WHERE LoginU='" . $user . "'");
        //éxito
        if ($result->num_rows == 1)
        {

            $respuesta = $mysqli->query("SELECT NombreU, ApellidosU FROM usuario WHERE LoginU='" . $user . "'");
            $fila = $respuesta->fetch_array();

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user;
            $_SESSION['nombre'] = $fila['ApellidosU'] . ", " . $fila['NombreU'];
            new DatosExportar_View();
        }
        //falla, por que?
        else
        {
            //El usuario existe pero la contraseña es incorrecta
            if ($result2->num_rows == 1)
            {
                new Mensaje("Contraseña incorrecta", './index.php?controller=Sesion');
            }
            //el usuario no existe
            else
            {
                new Mensaje("Usuario incorrecto: " . $user, './index.php?controller=Sesion');
            }
            return false;
        }
    }
}

?>

