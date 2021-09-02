<?php
class Sesion_View{

function __construct(){
	$this->render();
}

function render(){

    include 'Header.php'; 
   	?>
   	<script type="text/javascript" src="View/js/ValidarFechas.js"></script>
    <td width="80%" bgcolor="#FFFFFF"> <br>

  <table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" class="tituloSeccion" id="titulo_secc">
           
     <tr>
		
		<td>Portal de gestión de méritos curriculares<br><br></td>
        </tr>
      </table>
      
          <form name="formlogin" 
        method="post" 
        action="./index.php?controller=Sesion&action=verificar"
        >
              <table width="60%" border="0" align="center" cellpadding="2" cellspacing="2" class="textoFormularios">
                <tr class="cabeceraFormularios"> 
                  <td colspan="3"><div align="center">INICIO DE SESIÓN</div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr> 
                  <td width="40%"><div align="right"><strong>Usuario:</strong></div></td>
                  <td colspan="2"><input name="username" type="text" class="cajetinesFormularios" placeholder = 'Usuario' id="username" size="20" maxlength="40" required></td>
                </tr>
                                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr> 
                  <td><div align="right"><strong>Contraseña:</strong></div></td>

                  <td colspan="2"><input name="password" type="password" placeholder = 'Contraseña' class="cajetinesFormularios" id="nombre" size="20" maxlength="30" required></td>
                </tr>
                
                <tr> 
                
                <td colspan = "2">      
                <div align="center"><a class="enlace_local" href="#" onclick="alert('Usuario:\tfloro \nContraseña:\tfloro');">No recuerdo mi contraseña</a></div></td>
                </tr>
               
               
               <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>

                                 <td colspan="3"><div align="center"> 
                      <input name="Submit" type="submit" class="botonesFormularios" value="Entrar">
                    </div></td>
                </tr>
              </table>
            </form>


	<?php
			include 'Footer.php';
		} //fin de render
} //fin de clase
?>
