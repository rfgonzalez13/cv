<?php
class FicheroExportado{


function __construct(){
	$this->render();
	
}

function render(){

    include 'Header.php'; 
   	?>
    <td width="80%" bgcolor="#FFFFFF"> <br>

  <table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" class="tituloSeccion" id="titulo_secc">
           
     <tr>
		
		<td>Curriculum Generado<br>
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="./download.php" class="enlace_home"><img src="./View/img/save.png" width="15" height="15">&nbsp;Descargar aquí  </a><br>
		<div align="center">
		<a class="enlace_seccion" href="./index.php?controller=DatosExportar"><img src="./View/img/back.png" width="30" height="30"></a>
		<BR>
            <BR>
        </div>
		</td>
        
		</tr>
      </table>


	<?php
			include 'Footer.php';
		} //fin de render
} //fin de clase
?> 
