<?php

class Mensaje{

//ATRIBUTOS
var $mensaje;
var $link;


//METODOS

	function __construct($mensaje, $link){
		$this->mensaje = $mensaje;
		$this->link = $link;
		$this->render();
	}

	function render(){

    include 'Header.php'; 
   	?>
    <td width="80%" bgcolor="#FFFFFF"> <br>

  <table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" class="tituloSeccion" id="titulo_secc">
           
     <tr>
		
		<td>Error<br><br></td>
        </tr>
      </table>
     <table width="60%" border="0" align="center" cellpadding="2" cellspacing="2" class="textoFormularios">   

        <div align="center">

            <h2><?php echo $this->mensaje; ?></h2>

            <a class="enlace_seccion" href="<?php echo $this->link; ?>"><img src="./View/img/back.png" width="30" height="30"></a>
            <BR>
            <BR>
        </div>
    </table>
	<?php
			include 'Footer.php';
    }
    //fin de render
} //FIN DE CLASE MESSAGE
?> 
