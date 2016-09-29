<?php
function connetti() {
    $sql_host = "62.149.150.178";
    $sql_user = "Sql816366";
    $sql_password = "1lv76zs1tj";
    $sql_database = "Sql816366_3";
    /* Funzione di connessione al database */
    $link = mysqli_connect($sql_host,$sql_user,$sql_password,$sql_database);
    if ($link == FALSE || mysqli_select_db($link,$sql_database) == FALSE) {
        return false;
    }
    return $link;
}

function connetti2() {
    $sql_host = "62.149.150.178";
    $sql_user = "Sql816366";
    $sql_password = "1lv76zs1tj";
    $sql_database = "Sql816366_3";
    /* Funzione di connessione al database */
    echo 1;
    $link = mysql_connect($sql_host, $sql_user, $sql_password);
    echo 2;
    if ($link == FALSE || mysql_select_db($sql_database) == FALSE) {
        echo 3;
        return false;
    }
    echo 4;
    return $link;
}

