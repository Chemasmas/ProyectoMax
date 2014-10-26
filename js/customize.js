
 $(document).ready(function(){
    var sub=false;
    var neg=false;
	$("#letraTamaño").val($("#texto").css("font-size"));
	//SUBRAYADO
    $("#subrayado").click(function(){
        //alert("subrayado");
        if(sub==false){
            $("#texto").css("text-decoration","underline");
            sub=true;
        }else{
            $("#texto").css("text-decoration","none");
            sub=false;
        }
    });
	//NEGRITA
    $("#negrita").click(function(){
        //alert("subrayado");
        if(neg==false){
            $("#texto").css("font-weight","bold");
            neg=true;
        }else{
            $("#texto").css("font-weight","normal");
            neg=false;
        }
    });
	
	//TAMAÑO
	
	$("#letraTamaño").change(function(){
			$("#texto").css("font-size", $('#letraTamaño').val() + "px");
			$("#letraTamaño").val($("#texto").css("font-size"));
        });
	//AUMENTAR
	$("#aumentar").click(function(){
			var tamaño = $("#texto").css("font-size");
			var newTamaño = tamaño.substring(0, tamaño.length-2);
			newTamaño = parseInt(newTamaño);
			$("#texto").css("font-size", (newTamaño+1));
			$("#letraTamaño").val($("#texto").css("font-size"));
        });
	//DISMINUIR
	$("#disminuir").click(function(){
			var tamaño = $("#texto").css("font-size");
			var newTamaño = tamaño.substring(0, tamaño.length-2);
			$("#texto").css("font-size", (newTamaño-1));
			$("#letraTamaño").val($("#texto").css("font-size"));
        });
		
	//COLOR LETRA
	$("#color_letra").change(function(){
             var color_letra = $("#color_letra").val();
             $("#texto").css({'color': color_letra});
          });
		  
	//COLOR FONDO
		  $("#color_fondo").change(function(){
             var color_fondo = $("#color_fondo").val();
             $("#texto").css({'background-color': color_fondo});
          });
	
});