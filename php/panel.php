<html>
<head>
</head>
<link rel="stylesheet" href="css/editor.css">

<script src="js/customize.js"></script>
<script src="js/chema.js"></script>
<!--<script src="js/fuente.js"></script>-->
<script type="text/javascript">
$(document).ready(
	function()
	{
		$('#modificadores').load('./php/customize.php');
		$('#barraH').load('./php/toolbar.php');
	}); 
</script>
<body>
	<section>
		<div id="barraH"></div>
		<div id="vistaPrevia"></div>
		<div id="modificadores"></div>
	</section>
</body>
</html>