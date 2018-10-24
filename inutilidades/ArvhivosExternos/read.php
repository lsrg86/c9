<?php //con un if delante se puede condicionar el acceso a este elemento
//para leer archivo se usa el tipo mime y la localización del archivo
//hacer web que saque lista de usuarios con un + para agregar usuarios nuevos(abriendo otra pagina que pregunte los datos)creando una carpeta que se llame como el usuario.Si ya existe da error

//que luego tengamos una lista de usuarios y si pincho un usuario se vea la foto de ese usuario
//para el jueves 25
//hacer todo en "privado"
header('Content-type: image/jpeg');
readfile('../trayecto/archivo.jpg');