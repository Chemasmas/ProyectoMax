var htmlCargado;

$().ready(
	function()
	{
		//OpcionUno Cargar Archivo
		$("#opc1").click(
			function()
			{
				console.log("La carga del Archivo");
                var doc=$.ajax({
                            url:"php/listadoArchivos.php"
                        })
                            .done(function(json)
                            {
                                var respuesta=eval(json);
                                console.info(respuesta);
                                $("#file").append(new Option("Selecciona Una"));
                                for(var i=0;i<respuesta.length;i++)
                                {
                                    $("#file").append(new Option(respuesta[i][1],respuesta[i][0]))
                                }
                                console.info(json);
                            })
                            .fail(function()
                            {
                                alert("No se cargaron los archivos");
                            }).
                            complete(function()
                            {
                               
                });
                $("#archivoModal").dialog({});
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
        
        $("#file").change(function(){
                        $( "#archivoModal" ).dialog( "close" );
                                    $("#archivoModal").hide(function(){
                                        console.log($("#file").val());
                                        console.log($("#vistaPrevia"));
                                        var ruta=$("#file").val();
                                        ruta=ruta.substring(3);
                                        console.log(ruta);
                                        $("#vistaPrevia").load(ruta,function(){
                                            addListeners();
                                            estilo={};
                                        });
                                         var html=$.ajax({
                                            url:ruta
                                        })
                                        .done(function(html)
                                        {
                                            console.log("Aqui!!!");
                                            htmlCargado=html;
                                            console.log(html);
                                        })
                                        .fail(function()
                                        {
                                            alert("No obtuvo el archivo");
                                        }).
                                        complete(function()
                                        {
                                        });
                                    });
                                    //$("#file").html()="";
                                });
								
		$("#estilos").change(function(){
          		var estiloSeleccionado = $("#estilos").val();
                estiloSeleccionado += ".css";
                $("#linkestilo").attr("href", "css/"+estiloSeleccionado);
        	});
        
        
	});