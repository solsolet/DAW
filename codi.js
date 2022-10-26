window.addEventListener("load", function(){
    boton = document.getElementById("pulsameLogin");
    console.log(boton);

    //boton.onclick = aviso;
    boton.addEventListener("click", aviso);
})

function aviso(){
    var usuario = document.getElementById("usuario");
    var clave = document.getElementById("clave");
    console.log("De locos");

    mensaje = "";

    if(usuario.value == "" || onlySpaces(usuario.value)==true || usuario.value.includes(' ')){ //importante el .value si no no funciona
        mensaje += "Escriba el nombre de usaurio en un formato correcto\n";
    }
    if(clave.value == "" || onlySpaces(clave.value)==true || clave.value.includes(' ')){
        mensaje += "Escriba la contraseña en un formato correcto\n";
    }
    if(mensaje){ alert(mensaje); }
    //si todo va bien, enviamos el formulario
    
    
    if(!(usuario.value == "" || onlySpaces(usuario.value)==true || usuario.value.includes(' ')) && !(clave.value == "" || onlySpaces(clave.value)==true || clave.value.includes(' '))){
        window.location.href = "index2.html";
    }
}

function onlySpaces(str) {
    return str.trim().length === 0;
}