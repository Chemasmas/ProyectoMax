var selected;
var texto;
//Funcion para el Click
function addListeners()
{
    $("#vistaPrevia > * > *").click(function(elem)
        {
            //console.log(elem.target);
            selected=elem.target;
        });
    modificadores();
    console.log("Cargado");
}

function modificadores()
{
    var sub=false;
    var neg=false;

    $("#letraTamaño").val($(selected).css("font-size"));

    $("#subrayado").click(function(){
        if(sub==false){
            $(selected).css("text-decoration","underline");
            sub=true;
        }else{
            $(selected).css("text-decoration","none");
            sub=false;
        }
    });

    $("#negrita").click(function(){
        if(neg==false){
            $(selected).css("font-weight","bold");
            neg=true;
        }else{
            $(selected).css("font-weight","normal");
            neg=false;
        }
    });

    $("#letraTamaño").change(function(){
            $(selected).css("font-size", $('#letraTamaño').val() + "px");
            $("#letraTamaño").val($(selected).css("font-size"));
    });

    $("#aumentar").click(function(){

            var tamaño = $(selected).css("font-size");
            var newTamaño = tamaño.substring(0, tamaño.length-2);
            newTamaño = parseInt(newTamaño);
            $(selected).css("font-size", (newTamaño+1));
            $("#letraTamaño").val($(selected).css("font-size"));
    });
    $("#disminuir").click(function(){
            var tamaño = $(selected).css("font-size");
            var newTamaño = tamaño.substring(0, tamaño.length-2);
            $(selected).css("font-size", (newTamaño-1));
            $("#letraTamaño").val($(selected).css("font-size"));
    });

    $("#color_letra").change(function(){
             var color_letra = $("#color_letra").val();
             $(selected).css({'color': color_letra});
          });
          
    
    $("#color_fondo").change(function(){
             var color_fondo = $("#color_fondo").val();
             $(selected).css({'background-color': color_fondo});
    });

    $("#fontType").change(function(){
        $(selected).css("font-family", $('#fontType').val());
        $("#fontType").val($(selected).css("font-family"));
    });

    $(selected).select(function(){
        selectedText = document.getSelection();
        console.log("Ok");
        console.log(selectedText);
    });

}

/*
 $(document).ready(function(){

    var sub=false;
    var neg=false;

	$("#letraTamaño").val($(elem).css("font-size"));
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
*/