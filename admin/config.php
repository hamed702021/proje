<?php
$host = 'localhost';
$userName = 'root';
$pass = "";
$db = 'fft-db';

try{
    $connect=new PDO("mysql:host=$host;dbname=$db",$userName,$pass);
}
catch (PDOException $error)
{
    echo  "ERROR in connect".$error->getLine();
}