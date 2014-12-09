var selected;
var texto;
var estilo={};
//Funcion para el Click
function addListeners()
{
    $("#vistaPrevia > * > *").click(function(elem)
        {
            console.log("ok");
            selected=elem.target;
        });
    modificadores();
    console.log("Cargado");
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
        var id=$(selected).attr("id");
        if(reglaDefinida(id))
            if(propiedadDefinida(id,"font-weight"))
                if(getPropiedadDefinida(id,"font-weight")=="bold"){
                    $(selected).css("font-weight","normal");
                    agregarEstilo(id,"font-weight","normal");
                    return;
                }
        $(selected).css("font-weight","bold");
        agregarEstilo(id,"font-weight","bold");
    });

    $("#letraTamaño").change(function(){
        var id=$(selected).attr("id");
        
        $(selected).css("font-size", $('#letraTamaño').val() + "px");
        agregarEstilo(id,"font-size",$('#letraTamaño').val() + "px");
        $("#letraTamaño").val($(selected).css("font-size"));
    });

    $("#aumentar").click(function(){
            var id=$(selected).attr("id");
            var tamaño = $(selected).css("font-size");
            var newTamaño = tamaño.substring(0, tamaño.length-2);
            newTamaño = parseInt(newTamaño);
            $(selected).css("font-size", (newTamaño+1));
            console.log("chuchita");
            agregarEstilo(id,"font-size", newTamaño+1 + "px");
            $("#letraTamaño").val($(selected).css("font-size"));
    });
    $("#disminuir").click(function(){
            var id=$(selected).attr("id");
            var tamaño = $(selected).css("font-size");
            var newTamaño = tamaño.substring(0, tamaño.length-2);
            $(selected).css("font-size", (newTamaño-1));
            agregarEstilo(id,"font-size",newTamaño-1 + "px");
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
        //$(selected).css("font-size", $('#letraTamaño').val() + "px");
        // $("#letraTamaño").val($(selected).css("font-size"));
        $(selected).css("font-size", $('#letraTamaño').val() + "px");
        $("#letraTamaño").val($(selected).css("font-size"));
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
