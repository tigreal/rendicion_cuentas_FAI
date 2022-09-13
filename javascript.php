<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        console.log("hola");
        var name = "osmar";
        var nationality;
        nationality = "US";
        console.log(nationality);
        var weight = 150;

        var modulo = 9 % 3;
        console.log("modulo " + modulo);
        /*Si coloca los menos después de la variable, a la nueva variable se le asigna el valor original,
y la primera variable se decrementa.
1 var núm = 1;
2 var nuevoNum = num--;
num se reduce a 0 y newNum obtiene el valor original de num, 1.
Pero si coloca los menos antes de la variable, newNum se asigna al decrementado, no
el original, valor. Tanto num como newNum terminan con un valor de 0. */
        var num = 1;
        var newNum = num--;
        console.log("num-- :" + newNum);
        var num = 1;
        var newNum = --num;
        console.log("--num :" + newNum);

        var spec= prompt("cual es tu especie","humano");
        var x = prompt("donde vive pope");
        // se puede usar doble signo de igualdad pero siempre es mejor usar el triple
        if(x==="vaticano"){
            alert("corecto!");
        }
        //el comparador de no es igual
        var numerodeticket=0;
        if(numerodeticket!==443453){
            console.log("mejor suerte la proxima");
        }
        //sibolos logicos de comparacion
        var peso=0;
        if(peso>300 && tiempo<6){
            alert("vamos a entrenar");

        }else{
            alert("bienvenido a los gordos");
        }
        if(3>4 || 4>0 || 3.4 ===0){
            console.log("uno se cumplio");
        }

        var ciudades=["atlanta","baltimore","chicago"];
        console.log(ciudades[2]);
        var mascotas=[];
        mascotas[0]="perro";
        mascotas[1]="gatos";
        // se usa pop para borrar el ultimo elemento
        mascotas.pop();
        //para agregar elementos al final de array usamos push
        mascotas.push("pescado","pajaro");
        //se utiliza el metodo shift para remover el primer elemento del array
        mascotas.shift();
        //para agregar uno mas elementos al comienzo del array se usa unshift
        mascotas.unshift("perezosos","cancho");
        //con splice se aniade un elemento en el posion inicial tambien se puede colocar cuantos elementos se eliminaran
        var animales=["perro","gato","ave","gusano","ox"];
        var posision_inicial=2;
        var elementos_borrar=2;
        //este ejemplo empieza en el index 3 y borra 2 elementos
        animales.splice(posision_inicial,elementos_borrar,"pato","cerdo","emu");
        //con el metodo slice podemos hacer una copia desde donde el primer numero indica el indice desde donde queremos hacer la copia y el segundo es el indice de segundo
        var noPets=animales.slice(2,4);
        var nombre=["blueRay","upchuck","lojack","gizmo","do-rag"];
        var apellidos=["zzz","burp","dogbone","droop"];
        var NombreCompleto=[];
        for(var i=0;i<nombre.length;i++){
            for(var j=0;j<apellidos.length;j++){
                NombreCompleto.push(nombre[i]+" "+apellidos[j]);
            }
        }
        console.log(NombreCompleto);
        //trasformar una introducion de datos a mayusculas y minusculas

        var respuesta= prompt("introduce un nombre","osamr");
        respuesta=respuesta.toLowerCase();
        respuesta=respuesta.toUpperCase();
        // para buscar en una cadena de texto usamos indexOf
        var texto ="World War II";
        var primeraCadena=texto.indexOf("World War II");
        function hola(){
            alert("hola tony");
        }





    </script>
</head>

<body>
    <button name="boton" value="mandar" id="boton">boton</button>
    <input type="text" id="id_nombre">
    <a href="#" onclick="alert('hola');">Click</a>
    <a href="JavaScript:void(0)" onclick="var greet='hi';alert(greet);">Click</a>
    <a href="JavaScript:void(0)" onclick="var greet='hi';alert(greet);">Click</a>
    <img src="data:image/png;base64,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" onclick="hola();">
    </br>
    <img src="https://64.media.tumblr.com/7b0f3816fdc87ac5fdb38fbcb2613bd1/f3d43013148fcd39-79/s500x750/59b1cd098435ece57f766fae20edb6f54a2a249c.jpg" onmouseover="src='https://www.kindpng.com/picc/m/273-2737701_transparent-kid-trunks-png-kid-vegeta-png-download.png'" onmouseout="src='https://64.media.tumblr.com/7b0f3816fdc87ac5fdb38fbcb2613bd1/f3d43013148fcd39-79/s500x750/59b1cd098435ece57f766fae20edb6f54a2a249c.jpg'">
    </br>
    


   

</body>

</html>