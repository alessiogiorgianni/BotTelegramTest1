<?php
function connetti() {
    $sql_host = "xxx.xxx.xxx.xxx";
    $sql_user = "xxxxxxxxxxxxxxx";
    $sql_password = "xxxxxxxxxxx";
    $sql_database = "xxxxxxxxxxx";
    /* Funzione di connessione al database */
    $link = mysqli_connect($sql_host,$sql_user,$sql_password,$sql_database);
    if ($link == FALSE || mysqli_select_db($link,$sql_database) == FALSE) {
        return false;
    }
    return $link;
}

