<?php
$host="localhost";
$dbname="auth";
$user="root";
$pass="";
$conn=new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);
if($conn==true)
{
    echo "";
}
else{
    echo "";
}