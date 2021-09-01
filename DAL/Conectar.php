<?php

function OpenConnection()
{
    $serverName = "LAPTOP-UU81L79L";
    $connectionOptions = array("Database"=>"PetFinder 2.0");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false)
        die(FormatErrors(sqlsrv_errors()));

    return $conn;
}

?>
