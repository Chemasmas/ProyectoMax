<html>
<head>
</head>
<link rel="stylesheet" href="css/editor.css">
<script src="js/customize.js"></script>
<body>
<section>
  <fieldset><legend align="left">Texto</legend>
    	<hr>
  		<p>Tipo de letra</p>
  		<input id="negrita" title="Negrita" name="negrita" type="button" value="N">
  		<input id="subrayado" title="Subrayado" name="subrayado" type="button" value="S">
        <br/><br/>
        <select id="color_letra">
        	<option>Color letra..</option>
            <option value="white"> Blanco </option>
          	<option value="black"> Negro </option>
          	<option value="blue"> Azul </option>
          	<option value="red"> Rojo </option>
          	<option value="green"> Verde </option>
          	<option value="orange"> Naranja </option>
          	<option value="violet"> Violeta </option>
        </select>
  <br/><br/>
  		<input id="letraTamaño" name="letraTamaño" type="text" size="5" maxlength="3"> 
  		<button id="aumentar" name="aumentar"> A<sup>+</sup> </button>
  		<button id="disminuir" name="disminuir"> A<sup>-</sup> </button>
  		<hr>
        <p id="texto" >Fondo</p>
        <select id="color_fondo">
        	<option>Color fondo..</option>
            <option value="white"> Blanco </option>
          	<option value="black"> Negro </option>
          	<option value="blue"> Azul </option>
         	<option value="red"> Rojo </option>
          	<option value="green"> Verde </option>
          	<option value="orange"> Naranja </option>
          	<option value="violet"> Violeta </option>
        </select>
  </fieldset>

</section>	
</body>
</html>