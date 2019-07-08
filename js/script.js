function borrar(link){
    var confirm = window.confirm("¿Está seguro que quiere eliminar el elemento?");

    if(confirm){
        window.location.replace(link);
    }
}