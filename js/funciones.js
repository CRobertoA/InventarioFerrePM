function validarFormVacio(formulario){
    datos=$('#' + formulario).serialize();
    d=datos.split('&');
    vacios=0;
    for(i=0;i< d.length;i++){
            controles=d[i].split("=");
            if(controles[1]=="A" || controles[1]==""){
                vacios++;
            }
    }
    return vacios;
}

/*function cerrarSesion(){
    alertify.confirm("Advertencia",'¿Seguro que desea cerrar sesion?', function(){
        window.location="procesos/reglogin/salir.php";
    }, function(){ 
        alertify.error('Cancelo!')
    });
}*/