function borrar(link){
    var confirm = window.confirm("¿Está seguro que quiere eliminar el alumno?");

    if(confirm){
        window.location.replace(link);
    }


}