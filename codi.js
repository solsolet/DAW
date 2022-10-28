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
    var repe = document.getElementById("clave2");
    var email = document.getElementById("email");
    var registro = true;
    console.log("De locos");

    mensaje = "";

    if(vacio(usu) || noenglish(usu)  || usu.value.length<3 || usu.value.length>15){ //importante el .value si no no funciona
        mensaje += "Escriba el nombre de usaurio en un formato correcto\n";
        registro = false;       
    }

    if(vacio(clv) || noenglish(clv) || clv.value.length<6 || clv.value.length>15 || cosasContra(clv)){
        mensaje += "Escriba la contraseña en un formato correcto\n";
        registro = false;
    }
    if(repe.value != clv.value){
        mensaje += "Las contraseñas tienen que coincidir\n";
        registro = false;
    }
    if(vacio(email) || cosasEmail(email)){
        mensaje += "El formato del email no es correcto\n";
        registro = false;
    }

    if(mensaje != ""){ alert(mensaje); }

    //si todo va bien, enviamos el formulario   
    if(registro){
        window.location.href = "index2.html";
    }
}

function vacio(e){
    if(e.value == "" || e.value.includes(' ')) return true;
}

function noenglish(e){
    var bool = false;

    for(let i = 0; i < e.value.length && bool == false; i++){
        var val = e.value.charCodeAt(i);

        if(48 > val)
            bool = true;
        else
        if(val > 57 && val < 65)
            bool = true;
        else
        if( val > 90 && val < 97)
            bool = true;
        else
        if(val > 122)
            bool = true;
        
        if((val == 45 || val == 95) && e.name.includes("clave")){            
            bool  = false;
        }            
    }
    console.log("bool de english: "+bool);    
    return bool;
}

function cosasContra(e){
    var bool = true;
    var min = false;
    var may = false;
    var num = false;

    for(let i = 0; i < e.value.length && bool == true; i++){
        var val = e.value.charCodeAt(i);
        
        if(val >= 48 && val <=57){
            num = true;
        }
        if(val >= 97 && val <=122){
            min = true;
        }
        if(val >= 65 && val <=90){
            may = true;
        }
        if(min && may && num)
            bool = false;
    }
    console.log("bool de cosas: "+bool);    
    return bool;
}

function cosasEmail(e){
    bool = false;

    if(e.value.includes("@")){
        var part1 = e.value.includes("@");
       
        if(part1 < 1 && part1 > 65){

            for(let i = 0; i < part1 && bool == false; i++){
                var val = e.value.charCodeAt(i);
                
                if(val < 35)
                    bool = true;
                else
                if(val == 40 || val == 41)
                    bool = true;
                else
                if(57 < val && val < 65)
                    bool = true;
                else
                if( 90 < val && val < 97)
                    bool = true;
                if(122 < val)
                    bool = true;

                if(val == 33 || val == 61 || val == 63 || (93 < val && val < 96) || (122 < val && val < 127) )
                    bool = false; 
                    
                if(bool == false && ((i==0 && val == 46) || (i==part1-1 && val == 46))){
                    bool = true;
                }

                if(bool == false && val == 46 && i < part1-1){
                    var sig = e.value.charCodeAt(i+1);

                    if (sig == 46){
                        bool = true;
                    }
                }
            }    
        } else
            bool = true;

        if((e.value.length - part1) < 255){

            for(let i = part1 + 1; i < e.value.length && bool == false; i++){
                var val2 = e.value.charCodeAt(i);

                if(48 > val)
                bool = true;
                else
                if(val > 57 && val < 65)
                    bool = true;
                else
                if( val > 90 && val < 97)
                    bool = true;
                else
                if(val > 122)
                    bool = true;
                
                if(val == 45 || val == 46)           
                    bool  = false;
                
            }
        }
    }else
        bool = true;

    for(let i = 0; i < e.value.length && bool == true; i++){
        
       
    }

    return bool;
}

