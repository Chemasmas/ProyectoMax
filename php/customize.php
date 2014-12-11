<div>
  <p>Tipo de letra</p>
  <input id="negrita" title="Negrita" name="negrita" type="button" value="N">
  <input id="subrayado" title="Subrayado" name="subrayado" type="button" value="S">
</div>
<div>
  <p>Color de letra</p>
  <input type="color" id="color_letra">
</div>
<div>
  <p>Tamaño de letra</p>
  <input id="letraTamaño" name="letraTamaño" type="text" size="5" maxlength="3"> 
  <button id="aumentar" name="aumentar"> A<sup>+</sup> </button>
  <button id="disminuir" name="disminuir"> A<sup>-</sup> </button>
</div>
<div>
  <p>Fondo</p>
  <input type="color" id="color_fondo" />
  <p>Tipo de Fuente</p>
  <select id="fontType">
    <option>Fuente</option>
    <option value="pro"> Pro </option>
    <option value="arial"> Arial </option>
  </select>
</div>
<div>
  <p>Aliniado de texto</p>
    
    <input type="button" id="btn_right" name="right" onclick="alin(btn_right);"/>
    <input type="button" id="btn_justify" name="justify" onclick="alin(btn_justify);"/>  
    <input type="button" id="btn_left" name="left" onclick="alin(btn_left);"/>
    <input type="button" id="btn_center"  name="center" onclick="alin(btn_center);" />
   
</div>
<div>
  <p>Aliniado de texto</p>
    <input type="button" id="btn_circle" name="circle" onclick="listar(btn_circle);"/>
    <input type="button" id="btn_square" name="square" onclick="listar(btn_square);"/>
    <input type="button" id="btn_alpha" name="lower_alpha" onclick="listar(btn_alpha);"/>  
</div>