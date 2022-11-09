window.addEventListener("load", function(){
    
    boton = document.getElementById("pulsame");
        console.log(boton);

    if(window.location.href.includes("index.html"))
        boton.addEventListener("click", login);
      
    else if (window.location.href.includes("registro.html"))
         boton.addEventListener("click", registro);    
});

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
    var usu = document.getElementById("usuario"),
        clv = document.getElementById("clave"),
        repe = document.getElementById("clave2"),
        email = document.getElementById("email"),
        genero = document.getElementsByName("genero"), //en la pract pone sexo
        fnac = new Date(document.getElementById("fdn").value),
        registro = true;
    console.log("De locos");

    mensaje = "";

    if(vacio(usu) || noenglish(usu)  || usu.value.length<3 || usu.value.length>15){ //importante el .value si no no funciona
        mensaje += "Escriba el nombre de usuario en un formato correcto\n";
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
    if(!(genero[0].checked || genero[1].checked || genero[2].checked)){
        mensaje += "Debes seleccionar un género\n";
        registro = false;
    }
    if(!tiene18(fnac.getFullYear(),fnac.getMonth(),fnac.getDate())){
        mensaje += "Debes tener 18 años cumplidos"
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

    if(e.value.length <= 254){

        if(e.value.includes("@")){
            var part1 = e.value.indexOf("@");
            var comprobar = e.value.lastIndexOf("@");

            console.log(part1 + " " +comprobar);
            if(part1 == comprobar){
                //parte local
                if(part1 >= 1 && part1 <= 65){
                
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

                    console.log("bool de la parte local: " + bool);

                //dominio
                if((e.value.length - part1) < 255){
                    var dominio = "";
                    console.log("part1: " + part1);
                    for(let i = part1 + 1; i < e.value.length && bool == false; i++){
                        dominio = dominio + e.value[i];
                        var val2 = e.value.charCodeAt(i);
                        console.log(val2);

                        if(48 > val2)
                        bool = true;
                        else
                        if(val2 > 57 && val2 < 65)
                            bool = true;
                        else
                        if( val2 > 90 && val2 < 97)
                            bool = true;
                        else
                        if(val2 > 122)
                            bool = true;
                        
                        if(val2 == 45 || val2 == 46)           
                            bool  = false;   
                            
                            console.log(dominio);
                    }

                    if(bool == false){
                        
                        const subdominio = dominio.split('.');

                        for(let j = 0; j < subdominio.length && bool == false; j++){
                            console.log("ENTRA:" + subdominio[j]);
                            if(subdominio[j].length <= 63){

                                if(subdominio[j].includes('-')){
                                    
                                    if(subdominio[j].indexOf('-') == 0 || subdominio[j].lastIndexOf('-') == subdominio[j].length)
                                        console.log(subdominio[j].indexOf('-'));
                                        bool = true;                                
                                }
                            }
                        }
                    }
                }               
            }
            else
                bool = true;
        }
        else
            bool = true;

            console.log("bool del dominio: " + bool);
    }

    console.log(bool);
    return bool;
}

function tiene18(a, m, d){
    var losTiene = false,
        hoy = new Date();

    console.log(hoy)
    if((hoy.getFullYear() - a) > 18 ){
        losTiene = true;
    }
    if ((hoy.getFullYear() - a) == 18 ) {
        if (m < hoy.getMonth()) {
            losTiene = true;
        }
        if (m == hoy.getMonth()) {
            if (d <= hoy.getDate()) {
                losTiene = true;
            }
        }
    }
    return losTiene;
}

function precios(){
    var tabla = document.getElementById("precios"),
        ppagina;
        pfoto = 0.02;
        pfotocolor = 0.05;
        

    for(let i = 1; i < 3; i++){
        var tr = document.createElement("tr")

        if(i == 1)
            newContent = document.createTextNode(`<th></th>
                <th></th>
                <th colspan="2">Blanco y Negro</th>
                <th colspan="2">Color</th>`);  
        else
            newContent = document.createTextNode(`<th>Nº de Páginas</th>
                <th>Nº de Fotos</th>
                <th>150-300 dpi</th>
                <th>450-900 dpi</th>
                <th>150-300 dpi</th>
                <th>450-900 dpi</th>`);
        tr.appendChild(newContent);
        tabla.appendChild(tr);
    }

    for(let i = 1; i < 16; i++){
        var tr = document.createElement("tr"),
            acum,
            cont1, cont2, cont3, cont4, //cont x columnas
            fotos = i*3; 

        if(i < 5){
            ppagina = 0.1;
            cont1 = i * ppagina;    
        }            
        else if(i >= 5 && i <= 11){
            acum = 0.4;
            ppagina = 0.08;
            cont1 = (i-4)*ppagina+acum;
        }
        else {
            acum = 0.96;
            ppagina = 0.07;
            cont1 = (i-11)*ppagina+acum;
        }
        cont2 = cont1 + fotos * pfoto;
        cont3 = cont1 + fotos * pfotocolor;
        cont4 = cont1 + fotos * (pfoto + pfotocolor); 

        
        var newContent = document.createTextNode(`<td>${i}</td><td>${fotos}</td><td>${cont1.toFixed(2)}</td><td>${cont2.toFixed(2)}</td><td>${cont3.toFixed(2)}</td><td>${cont4.toFixed(2)}</td>`);
        tr.appendChild(newContent); //añade texto al div creado;
        tabla.appendChild(tr);
    }
}