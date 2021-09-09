<?php
class DatosExportar_View{


function __construct(){

	$this->render();
	
}

function render(){
    session_start();
    include 'Header.php'; 
   	?>
   

<script type="text/javascript" src="View/js/ValidarFechas.js"></script>
<td width="80%" bgcolor="#FFFFFF">
   <br>
   <table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" class="tituloSeccion" id="titulo_secc">
      <tr>
         <td>Curriculum Vitae de <?php echo $_SESSION['nombre']; ?><br><br></td>
      </tr>
   </table>
   <form name="formfiltro" 
      method="post" 
      action="./index.php?controller=GenerarFichero&action=exportar"
      onsubmit ="return ValidarFechas()"
      >
      <table width="60%" border="0" align="center" cellpadding="2" cellspacing="2" class="textoFormularios">
         <tr class="cabeceraFormularios">
            <td colspan="3">
               <div align="center">Formato del currículum</div>
            </td>
         </tr>
         <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
         </tr>
         <tr>
            <td width="26%">
               <div align="right"><strong>Formato:</strong></div>
            </td>
            <td colspan="2">
               <select name="formato" id="formato" class="cajetinesFormularios">
                  <option value="Txt">Txt</option>
                  <option value="Xunta">Xunta</option>
                  <option value="Aneca">Aneca</option>
                  <option value="Cityt">Cityt</option>
               </select>
            </td>
         </tr>
         <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
         </tr>
         <tr class="cabeceraFormularios">
            <td colspan="3">
               <div align="center">Rango de Fechas de los méritos</div>
            </td>
         </tr>
         <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
         </tr>
         <tr>
            <td>
               <div align="right"><strong>Fecha Inicio:</strong></div>
            </td>
            <td width="29%"><input name="fechai" type="date" class="cajetinesFormularios" id="fechai" size="12" min="1900-01-01" max="2050-12-31" value="1980-01-01"></td>
            <td width="45%"><strong>Fecha Fin:</strong> <input name="fechaf" type="date" class="cajetinesFormularios" id="fechaf" size="12" min="1910-01-01" max="2060-12-31"></td>
            <td colspan="3">
               <hr width="100%" size="1" noshade>
            </td>
         </tr>
         <tr>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
         </tr>
         <tr>
            <td colspan="3">
               <div align="center">
                  <input name="Submit" type="submit" class="botonesFormularios" value="Exportar CV">
               </div>
            </td>
         </tr>
      </table>
   </form>



             
	<?php
			include 'Footer.php';
		} //fin de render
} //fin de clase
?>
