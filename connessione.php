<?php
function connetti() {
    $sql_host = "sql8.freemysqlhosting.net";
    $sql_user = "sql8137964";
    $sql_password = "sql8137964";
    $sql_database = "tHNRtBkcZY";
    /* Funzione di connessione al database */
    $link = mysql_connect($sql_host, $sql_user, $sql_password);
    if ($link == FALSE || mysql_select_db($sql_database) == FALSE) {
        print '<script type="text/javascript">';
        print 'alert("Errore connessione MYSQL!")';
        print '</script>';
    }
    return $link;
}
/* 
Server: sql8.freemysqlhosting.net
Name: sql8137964
Username: sql8137964
Password: tHNRtBkcZY
Port number: 3306
 */

