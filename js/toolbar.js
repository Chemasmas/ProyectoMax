$().ready(
	function()
	{
		//OpcionUno Cargar Archivo
		$("#opc1").click(
			function()
			{
				console.log("La carga del Archivo");
				$('#vistaPrevia').load('./html/template4.html', function()
				{
					addListeners();
				}); //Esta ruta aun esta pendiente
			});
		$("#opc2").click(
			function()
			{
				alert("Esta es la opcion 2");
			});
	});