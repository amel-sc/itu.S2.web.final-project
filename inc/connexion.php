<?php 
function dbconnect()
{
    static $connect = null;
    if($connect === null)
    {
        $connect = mysqli_connect('localhost', 'root', '', 'final_exam');

        if(!$connect)
        {
            die('Erreur de connection: '.mysqli_connect_error());
        }
        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}