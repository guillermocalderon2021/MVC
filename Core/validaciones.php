<?php
function estaVacio($var){
 return empty(trim($var));
}

function esTexto($var){
    return preg_match('/^[a-zA-Z ]+$/',$var);
}

function esMail($var){
    return filter_var($var,FILTER_VALIDATE_EMAIL);
}

function esCarnet($var){
    return preg_match('/^[A-Z]{2}[0-9]{6}$/',$var);
}

function esTelefono($var){
    return preg_match('/^[267][0-9]{3}-?[0-9]{4}$/',$var);
}

function esCodigoEditorial($var){
    return preg_match('/^EDI[0-9]{3}$/',$var);
}


?>