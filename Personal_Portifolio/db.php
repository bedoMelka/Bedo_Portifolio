<?php
$servername='localhost';
$username='root';
$password='';
$dbname="my_portifolio";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
     die('cold not connect' .mysqli_connect_error());
    }
$conn=mysqli_connect("localhost","root"," ","my_portifolio") or die(mysqli_connect_error());


?>