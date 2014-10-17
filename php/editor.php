<?php
	require_once "template.php";
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>

<script>
	$().ready(
		function()
		{
			$("title").html("Editor De Imagenes");
			var doc=$.ajax({
				url:"panel.php"
			})
			.done(function(html)
			{
				//alert("Exito");
				$("section").append(html);
			})
			.fail(function()
			{
				alert("Fallo");
			}).
			complete(function()
			{
				//alert("Terminado");
			});
		}
	);
</script>