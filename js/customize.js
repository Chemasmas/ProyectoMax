var selected;
var texto;
var estilo={};
//Funcion para el Click
function addListeners()
{
    console.log("Colocando");
    $("#vistaPrevia > * > *").click(function(elem)
        {
            console.error(elem.target);
            console.log("Click");
            selected=elem.target;
            modificadores();
        });
    console.log("Colocado");
}

function modificadores()
{
    
    var neg=false;

    $("#letraTamaño").val($(selected).css("font-size"));

    $("#subrayado").click(function(){
        var id=$(selected).attr("id");
        if(reglaDefinida(id))
            if(propiedadDefinida(id,"text-decoration"))
                if(getPropiedadDefinida(id,"text-decoration")=="underline"){
                    $(selected).css("text-decoration","none");
                    agregarEstilo(id,"text-decoration","none");
                    return;
                }
        $(selected).css("text-decoration","underline");
        agregarEstilo(id,"text-decoration","underline");
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

function agregarEstilo(selector,propiedad,valor)
{
    if(estilo[selector]==undefined)
    {
        estilo[selector]={};
        estilo[selector][propiedad]=valor;
    }
    
    else{
        estilo[selector][propiedad]=valor;        
    }     
}
function reglaDefinida(selector)
{
    if(estilo[selector]==undefined)
        return false;
    
    return true;
}
function propiedadDefinida(selector,propiedad)
{
    console.log(selector+" "+propiedad)
    console.log(estilo[selector][propiedad]);
    if(reglaDefinida(selector))
    {
        if(estilo[selector][propiedad]==undefined)
            return false;
        return true;
    }
    return false;
}

function getPropiedadDefinida(selector,propiedad)
{
    console.log(selector+" "+propiedad)
    console.log(estilo[selector][propiedad]);
    if(reglaDefinida(selector))
    {
        if(estilo[selector][propiedad]==undefined)
            return undefined;
        return estilo[selector][propiedad];
    }
    return undefined;
}
