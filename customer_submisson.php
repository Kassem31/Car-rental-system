<?php
session_start();


// send user id

$user_id=4;
$model=$_POST['model_select'];
$air_con=$_POST['air_con'];
$pickup_date=$_POST['pickup_date'];
$return_date=$_POST['return_date'];

$conn=mysqli_connect('localhost','root','','rental');
$sql="SELECT * FROM `car` WHERE status=1 AND airconditioned='$air_con' and manefacturing_company='$model' ";
$query=mysqli_query($conn,$sql);
$car=mysqli_fetch_array($query);
if(!empty($car))
$plate_id=$car['plate_id'];

if(!empty($car)){
$sql="UPDATE car set status=0 WHERE  plate_id='$plate_id' " ;
$query=mysqli_query($conn,$sql);

$sql="INSERT INTO reservation(user_id,plate_id,pickup_date,return_date,fee) VALUES('$user_id','$plate_id','$pickup_date','$return_date',datediff('$return_date','$pickup_date')) " ;
$query=mysqli_query($conn,$sql);


echo "success";
}
 else {

echo "no car with selected specs found try other specs";

}

mysqli_close($conn);

 ?>
