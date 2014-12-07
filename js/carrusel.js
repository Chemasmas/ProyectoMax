$(document).ready(function(){
	//evento clic de la flecha izquierda
	$('#divIzquierda').click(function(){
		//tomamos el ultimo elemento de la lista y lo colocamos en la ultima posicion
		$('#divCentro ul').prepend($('#divCentro ul li:last'));
	});
	
	//evento clic de la flecha derecha
	$('#divDerecha').click(function(){
		//tomamos el primer elemento de la lista y lo trasladamos a la primera posicion
		$('#divCentro ul').append($('#divCentro ul li:first'));
	});
});