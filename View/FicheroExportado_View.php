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
		<a href="./download.php">Descargar curriculum</a>
		<br></td>
        </tr>
      </table>


	<?php
			include 'Footer.php';
		} //fin de render
} //fin de clase
?> 
