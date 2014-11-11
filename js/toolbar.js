$().ready(
	function()
	{
		//OpcionUno Cargar Archivo
		$("#opc1").click(
			function()
			{
				console.log("La carga del Archivo");
				//$('#vistaPrevia').load('./usuario/Template5/template4.html', function()
                $("#archivoModal").show(
                    function()
                    {
                        var doc=$.ajax({
                            url:"php/listadoArchivos.php"
                        })
                            .done(function(json)
                            {
                                //$("#file").append(html);
                                var respuesta=eval(json);

                                for(var i=0;i<respuesta.length;i++)
                                {
                                    $("#file").append(new Option(respuesta[i][1],respuesta[i][0]))
                                }

                            })
                            .fail(function()
                            {
                                alert("No se cargaron los archivos");
                            }).
                            complete(function()
                            {
                                //alert("Terminado");
                            });
                    }
                );

                /*$('#vistaPrevia').load('./html/basic.html', function()
				{
					addListeners();
				}); //Esta ruta aun esta pendiente*/
			});
		$("#opc2").click(
			function()
			{
				alert("Esta es la opcion 2");
			});



        $("#Filecancel").click(function()
        {
            $("#archivoModal").hide();
            $("#file").html("");
        });

        $("#Fileaceptar").click(function()
        {
            var val=$("#file").val();
            console.log(val);
            $('#vistaPrevia').load(val, function()
            {
                addListeners();
            });
            $("#archivoModal").hide();
            $("#file").html("");
        });
	});