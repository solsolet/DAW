window.addEventListener("load", function(){
    
    boton = document.getElementById("pulsame");
        console.log(boton);

    if(window.location.href.includes("index.html"))
        boton.addEventListener("click", login);
      
    else if (window.location.href.includes("registro.html"))
         boton.addEventListener("click", registro);
        
    
})

function login(){
    var usuario = document.getElementById("usuario");
    var clave = document.getElementById("clave");
    //console.log("De locos");

    mensaje = "";

    if(vacio(usuario)){ //importante el .value si no no funciona
        mensaje += "Escriba el nombre de usaurio en un formato correcto\n";
    }
    if(vacio(clave)){
        mensaje += "Escriba la contraseña en un formato correcto\n";
    }
    if(mensaje){ alert(mensaje); }
    //si todo va bien, enviamos el formulario
    
    if(!vacio(usuario) && !vacio(clave)){
        window.location.href = "index2.html";
    }
}

function registro(){
    var usu = document.getElementById("usuario");
    var clv = document.getElementById("clave");
    var usuario = true;
    var clave = true;
    console.log("De locos");

    mensaje = "";

    if(vacio(usu) || noenglish(usu)  || usu.value.length<3 || usu.value.length>15){ //importante el .value si no no funciona
        mensaje += "Escriba el nombre de usaurio en un formato correcto\n";
        usuario = false;
        console.log(usuario+" "+clave);
    }

    if(vacio(clv) || noenglish(clv) || clv.value.length<6 || clv.value.length>15){
        mensaje += "Escriba la contraseña en un formato correcto\n";
        clave = false;
        console.log(usuario+" "+clave);
    }
    console.log(usuario+" "+clave);
    if(mensaje != ""){ alert(mensaje); }
    //si todo va bien, enviamos el formulario
    
    

    if(usuario && clave){
        window.location.href = "index2.html";
    }
}

function vacio(e){
    console.log("vacio");

    if(e.value == "" || e.value.includes(' ')) return true;
}

function noenglish(e){
    console.log(e.name);
    var bool = false;

    for(let i = 0; i < e.value.length && bool == false; i++){
        var val = e.value.charCodeAt(i);
        console.log(val);

        if(48 > val)
            bool = true;
        else
        if(val > 57 && val < 65)
            bool = true;
        else
        if( val > 90 && val < 97)
            bool = true;
        if(val > 122)
            bool = true;
        
        if((val == 45 || val == 95) && e.name.includes("clave")){            
            bool  = false;
        }            
    }    
    return bool;
}


