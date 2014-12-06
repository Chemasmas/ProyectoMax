<!doctype html>
<html>
  	<head>
        <link rel="stylesheet" href="css/editor.css">
  		<link rel="stylesheet" href='css/template.css' type="text/css" />
        <link rel="stylesheet" href='css/fuentes.css' type="text/css" />
		<meta charset="UTF-8" />
       	<title>Editor de Imagenes</title>

        <!--jquery-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>

        <!--jquery ui-->
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

        <script src="js/customize.js"></script>
        <script src="js/chema.js"></script>

  	</head>
  
	<body>
    	<div align="center"  style=" margin:0 auto; alignment-adjust:central; width: 1024px; height:600px;"> 
  			<header>
           	<div style="width: 1024px; height:100px; background:url(res/encabezado.png) no-repeat">
              </div>
           </header>
    		<div class="navMenu expander">
    			<nav>
                    <a href="#" title="Doc">Doc</a>
                    <a href="editor.php" title="Estilo">Estilo</a>
                    <a href="#" title="Admin">Admin</a>
                    <a href="index.php" title="Salir">Salir</a>
                </nav>
              </div>
    		
            <section style="height:400px; width:1024;">

    			<?php include "php/panel.php" ?>

 		   	</section>
    		
            <footer>
            	<hr color="#FF6633"/>
            	<table width="1024px"	 align="center">
                <tr>
                <td>
              <p id="footer_one"><strong>Unidad Cuajimalpa</strong></p>
              <p id="footer_dir">DCCD | División de Ciencias de la Comunicación y Diseño 
              Torre III, 5to. piso. Avenida Vasco de Quiroga 4871,<br />
				Colonia Santa Fe Cuajimalpa. Delegación Cuajimalpa de Morelos, Tel. +52 (55) 5814-6550 y 51. C.P. 05300, México, D.F. http://dccd.cua.uam.mx</p>
                </td>
                <td>  <img src="res/pie.png"></td>
                
                </tr>
                </table>
            </footer>
    </div>



    </body> 
    </html>  
   



