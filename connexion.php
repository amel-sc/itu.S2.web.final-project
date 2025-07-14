<?php 
function dbconnect()
{
    static $connect = null;
    if($connect === null)
    {
        $connect = mysqli_connect('localhost', 'ETU003938', 'wpZ2khWZ', 'db_s2_ETU003938');

        if(!$connect)
        {
            die('Erreur de connection: '.mysqli_connect_error());
        }
        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}
