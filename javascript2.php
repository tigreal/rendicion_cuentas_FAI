<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {display:none;}
        
    </style>
    <script>
        function verificarEmail(fielId) {
            if (document.getElementById(fielId).value === "") {
                console.log("favor introdusca su email");

            }

        }

        function llenarCiudad() {
            var ciudadNombre;
            switch (document.getElementById('zip').value) {
                case "12345":
                    ciudadNombre = "la paz";
                    break;
                case "123456":
                    ciudadNombre = "cochabamba";
                    break;
                case "1234567":
                    ciudadNombre = "Santa Cruz";
                    break;

                default:
                    break;
            }
            document.getElementById('ciudad').value= ciudadNombre;

        }
        function expanLoris(){
            var textoFull="presiona en el link para ver el texto completo ahora si se puede ver todo el texto oculto"
            document.getElementById('parafo').innerHTML=textoFull;

        
        }
        function generadorLista(){
            var listasHtml="<ol><li>uno</li><li>dos</li><li>tres</li></ol>";
            document.getElementById('lista').innerHTML=listasHtml;
        }
        function esconder() {
            document.getElementById('mr').className +=" hidden";

        }
        function cambiarImagen(id,image){
            document.getElementById(id).src=image;
        }
        function hacerGrande() {
            document.getElementById('noticia').style.fontSize="2em";
        }
        function escondeImg1(params) {
            document.getElementById('imagen01').style.visibility="hidden";
            
        }
        function cambiarFuente() {
            var labels=document.getElementsByTagName("label");
            for(i=0;i<labels.length;i++){
                labels[i].style.fontFamily="fantasy";
                labels[i].fontSize="3m";
            }
            
        }
        function cambiaColor() {
            var elementos = document.getElementById('nombres');
            var cabeceras= elementos.getElementsByTagName("th");
            var celldas= elementos.getElementsByTagName("td");
            for(i=0;i<cabeceras.length;i++){
                cabeceras[i].style.backgroundColor="pink";
                for(j=0;j<celldas.length;j++){
                    celldas[j].style.backgroundColor="green";

                }
            }
            
        }
        function magia() {
            var truco="debes buscar ese termino que desaparecio en internet para ver como se declaran las propiedades de estatilo cuando quieres mandarlas desde javascript recuerda que si no esta bien escrito te arrojara un error atte el oso";
            document.getElementById("trick").innerHTML=truco;
            
        }



    </script>
</head>

<body>
    
    <form action="" onsubmit="verificarEmail('email');">
    <pre>
    <label for="email">Email:</label>    
    <input type="text" id="email">
    <label for="zip code">zip code</label>
    <input type="text" id="zip" onblur="llenarCiudad();">
    <label for="ciudad">Ciudad</label>
    <input type="text" id="ciudad" >
    <input type="submit" value="submit">
    <p id="parafo">presiona en el link para ver el texto completo <a href="javascript:void(0);" onclick="expanLoris();"><em>click+</em></a></p>
    <div id="lista">
        <input type="button" value="gen lista" name="" id="" onclick="generadorLista();">
    </div>
    <label for="">Presiona la imagen y desaparecer</label>
    <img src="https://imgs.search.brave.com/2ANi7Vy2IZBGTlejRvDOeq4r8mzgqnZwjLX3jf4RbEY/rs:fit:900:856:1/g:ce/aHR0cHM6Ly93d3cu/Y2xpcGFydGtleS5j/b20vbXBuZ3MvbS8x/MDMtMTAzMTkwOV90/cmFuc3BhcmVudC1w/b2tlbW9uLXBuZy1p/bWFnZXMtcG9rZW1v/bi1tci1taW1lLXBu/Zy5wbmc" width="50" height="50" id="mr" style="border-radius:50%" alt="" onclick="esconder();">
    <img src="https://imgs.search.brave.com/D5vMiozuEcG5BhwVHlVHfMBgogC-v082RFwsgG4QWu8/rs:fit:508:225:1/g:ce/aHR0cHM6Ly90c2Uy/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5h/UU9GNV9ndTBLYU1h/aE5XVFlJWTFRSGFH/NiZwaWQ9QXBp" id="pokemon" alt="" width="50" height="50" onclick="cambiarImagen('pokemon','https://imgs.search.brave.com/bvDKEd3j8L8uMVFkEODkik4zSgURWJIWmu7WkAElyNo/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Ux/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5k/TVZPYVFBNlFXcGxV/NmV5X3htM3Z3SGFI/YSZwaWQ9QXBp');">
    <p id="noticia" style="font-size: 1em;" onclick="hacerGrande();">Esta es una noticia</p>
    <p>esta imagen desaparece por css pero asignado por javascript</p>
    <img src="https://imgs.search.brave.com/PRwSh2MWAXkiulgGjfX0QAacCeZMI9IW1qfeGZ-tgug/rs:fit:1057:1132:1/g:ce/aHR0cDovLzEuYnAu/YmxvZ3Nwb3QuY29t/Ly11ZTBSVWxtNks5/OC9WTnpzcUpFY20z/SS9BQUFBQUFBQUFQ/dy9CSHFVdmFKZ0V4/QS9zMTYwMC9idWxi/YXNhdXIucG5n" id="imagen01" onclick="escondeImg1();" width="50"  height="50" alt="">
    </br>
    <label onclick="cambiarFuente();">Este label cambia todos los labels por una fuente de letra diferente</label>
  

   


    </pre>
    <style>
        table,th,td{
            border: 1px solid black;
            padding: 0 0 0 0;
        }
    </style>

    <table id="nombres">
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Apellido
            </th>
        </tr>
        <tr>
            <td>
                Osmar
            </td>
            <td>
                Alvarez
            </td>
        </tr>
    </table>

    <input type="button" value="COLOR" id="botonColor" onclick=" cambiaColor();">
    </form>
    <p id="trick" onclick="magia();">HTML DOM Style Object</p>
    <div id="lpz">
        <p>torutga</p>
        <p>mago</p>
    </div>
    <div id="cbba">
        <p>coche</p>
        <p>tanke</p>
    </div>


</body>

</html>