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
function ReadData()
{
    try
    {
        $conn = OpenConnection();
        $tsql = "SELECT * FROM Usuario";
        $getProducts = sqlsrv_query($conn, $tsql);
        if ($getProducts == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        $productCount = 0;
        while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {
            echo($row['Nombre']);
            echo("<br/>");
            $productCount++;
        }
        sqlsrv_free_stmt($getProducts);
        sqlsrv_close($conn);
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}

ReadData();

?>
