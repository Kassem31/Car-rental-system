<?php


$model=$_POST['car_model'];
$plate=$_POST['plate_id'];
$air_con=$_POST['air_con'];


$conn=mysqli_connect('localhost','root','','rental');
$sql="INSERT INTO car(plate_id,manefacturing_company,airconditioned,status) VALUES('$plate','$model','$air_con','1') "; // make car id auto increment
$query=mysqli_query($conn,$sql);
echo "inserted car";




 ?>
