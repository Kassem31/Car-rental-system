<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>reports</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <link rel="stylesheet" href="reports.css">
  <body>
    <h1>Reports</h1>
<div class="div">



<div  class="middle">
  <form id="rep "class=""  method="post">
  <label for="">show reports by reservation date : from </label>
 <input class="x2" type="date" name="reserveStart_date" value="">
 <label for=""> to </label>
 <input type="date" name="reserveEnd_date" value="">
    <input type="submit" name="submit" value="go">
<br>
<label for="">show reports of a certain model (for a specific period choose a date from above first) :</label>
<label for="">select model</label>
<select class="" name="model_select">
<option value="">select</option>
<?php

 $conn=mysqli_connect('localhost','root','','rental');
 $sql="SELECT DISTINCT manefacturing_company FROM `car`";
 $query=mysqli_query($conn,$sql);

while ( $models=mysqli_fetch_array($query)) {
echo '<option>'.$models['manefacturing_company'].'</option>';
}

?>
<input type="submit" name="submit2" value="go">
<br>
<label for="">show current status of all cars </label>
 <input type="submit" name="submit3" value="go">
 <br>
 <label for="">show reservations for a customer : </label>
 <input type="text" name="customer_info" placeholder="Enter username or email">
 <input type="submit" name="submit4" value="go">
 <br>
 <label for="">show payments within a specified date : from </label>
 <input type="date" name="payment_from" value="">
 <label for=""> to </label>
 <input type="date" name="payment_to" value="">
    <input type="submit" name="submit5" value="go">
<?php
if(isset($_POST['submit'])){  
$conn=mysqli_connect('localhost','root','','rental');
$reserveStart_date=$_POST['reserveStart_date'];
$reserveEnd_date=$_POST['reserveEnd_date'];
if($reserveStart_date>=$reserveEnd_date)
{
  echo '<script>alert("wrong input dates , please try again")</script>';
}
else
{
$sql="SELECT DISTINCT *
FROM system_user NATURAL  JOIN reservation NATURAL  JOIN car
WHERE reservation_date BETWEEN '$reserveStart_date' AND '$reserveEnd_date'  ";
$query=mysqli_query($conn,$sql);
$result =$conn -> query($sql);
if($result -> num_rows >0){
echo "<h2>reports</h1>";
echo "    <table>
      <tr>
        <th>plate_id</th>
        <th>user_id</th>
        <th>email</th>
        <th>name</th>
        <th>pass</th>
        <th>admin</th>
        <th>pick_date</th>
        <th>ret_date</th>
        <th>fee</th>
        <th>brand</th>
        <th>model</th>
        <th>model_year</th>
        <th>aircond</th>
        <th>status</th>
        <th>price_per_day</th>
      </tr>";

while ($tuples=mysqli_fetch_array($query))
{
  echo "<tr><td>".$tuples['plate_id']."</td><td>".$tuples['user_id']."</td><td>".$tuples['email']."</td><td>".$tuples['user_name']."</td><td>".$tuples['pass']."</td><td>".$tuples['admin']."</td><td>".$tuples['pickup_date']."</td><td>".$tuples['return_date'].
  "</td><td>".$tuples['fee']."</td><td>".$tuples['manefacturing_company']."</td><td>".$tuples['model']."</td><td>".$tuples['model_year']."</td><td>".$tuples['airconditioned']."</td><td>".$tuples['status']."</td><td>".$tuples['price_per_day']."</td></tr>";
}


echo "</table>";


}
}
mysqli_close($conn);
}

if(isset($_POST['submit2'])){
  
    $conn=mysqli_connect('localhost','root','','rental');
    $reserveStart_date=$_POST['reserveStart_date'];
    $reserveEnd_date=$_POST['reserveEnd_date'];
    $manefacturing_company=$_POST['model_select'];
    if(!empty($reserveStart_date) && !empty($reserveEnd_date))
    {
    $sql="SELECT DISTINCT *
    FROM system_user NATURAL  JOIN reservation NATURAL  JOIN car
    WHERE manefacturing_company='$manefacturing_company' AND reservation_date BETWEEN '$reserveStart_date' AND '$reserveEnd_date'  ";
    }
    else
    {
        $sql="SELECT DISTINCT *
    FROM system_user NATURAL  JOIN reservation NATURAL  JOIN car
    WHERE manefacturing_company='$manefacturing_company'# reservation_date BETWEEN '$reserveStart_date' AND '$reserveEnd_date'  ";
    }
    $query=mysqli_query($conn,$sql);
    
    $result =$conn -> query($sql);
    if($result -> num_rows >0){
    echo "<h2>reports</h1>";
    echo "    <table>
          <tr>
            <th>plate_id</th>
            <th>user_id</th>
            <th>email</th>
            <th>name</th>
            <th>pass</th>
            <th>admin</th>
            <th>pick_date</th>
            <th>ret_date</th>
            <th>fee</th>
            <th>brand</th>
            <th>model</th>
            <th>model_year</>
            <th>aircond</th>
            <th>status</th>
            <th>price_per_day</th>
    
    
          </tr>";
    
    while ($tuples=mysqli_fetch_array($query))
    {
      echo "<tr><td>".$tuples['plate_id']."</td><td>".$tuples['user_id']."</td><td>".$tuples['email']."</td><td>".$tuples['user_name']."</td><td>".$tuples['pass']."</td><td>".$tuples['admin']."</td><td>".$tuples['pickup_date']."</td><td>".$tuples['return_date'].
      "</td><td>".$tuples['fee']."</td><td>".$tuples['manefacturing_company']."</td><td>".$tuples['model']."</td><td>".$tuples['model_year']."</td><td>".$tuples['airconditioned']."</td><td>".$tuples['status']."</td><td>".$tuples['price_per_day']."</td></tr>";
    }
    
    
    echo "</table>";
    
    
    }
    mysqli_close($conn);
    }
    if(isset($_POST['submit3'])){
      $conn=mysqli_connect('localhost','root','','rental');
      $sql="SELECT DISTINCT *
      FROM system_user NATURAL JOIN reservation NATURAL  JOIN car";
      $query=mysqli_query($conn,$sql);
      $result =$conn -> query($sql);
      if($result -> num_rows >0){
      echo "<h2>reports</h1>";
      echo "    <table>
            <tr>
              <th>plate_id</th>
              <th>brand</th>
              <th>model</th>
              <th>model_year</th>
              <th>air_cond</th>
              <th>status</th>
              <th>price_per_day</th>
            </tr>";
      
      while ($tuples=mysqli_fetch_array($query))
        echo "<tr><td>".$tuples['plate_id']."</td><td>".$tuples['manefacturing_company']."</td><td>".$tuples['model']."</td><td>".$tuples['model_year']."</td><td>".$tuples['airconditioned']."</td><td>".$tuples['status']."</td><td>".$tuples['price_per_day']."</td></tr>";
  

      echo "</table>"; 
      }
      mysqli_close($conn);
      }
      if(isset($_POST['submit4'])){  
        $conn=mysqli_connect('localhost','root','','rental');
        $customer_info=$_POST['customer_info'];
        $sql="SELECT DISTINCT *
        FROM system_user NATURAL  JOIN reservation NATURAL  JOIN car
        WHERE user_name = '$customer_info' OR email = '$customer_info'  ";
        $query=mysqli_query($conn,$sql);
        
        $result =$conn -> query($sql);
        if($result -> num_rows >0){
        echo "<h2>reports</h1>";
        echo "    <table>
              <tr>
                <th>user_id</th>
                <th>email</th>
                <th>name</th>
                <th>pass</th>
                <th>admin</th>
                <th>pick_date</th>
                <th>ret_date</th>
                <th>fee</th>
                <th>plate_id</th>
                <th>brand</th>
                <th>model</th>
                <th>model_year</th>
                <th>price_per_day</th>
        
        
              </tr>";
        
        while ($tuples=mysqli_fetch_array($query))
        {
          echo "<tr><td>".$tuples['user_id']."</td><td>".$tuples['email']."</td><td>".$tuples['user_name']."</td><td>".$tuples['pass']."</td><td>".$tuples['admin']."</td><td>".$tuples['pickup_date']."</td><td>".$tuples['return_date'].
          "</td><td>".$tuples['fee']."</td><td>".$tuples['plate_id']."</td><td>".$tuples['manefacturing_company']."</td><td>".$tuples['model']."</td><td>".$tuples['model_year']."</td><td>".$tuples['price_per_day']."</td></tr>";
        }
        
        
        echo "</table>";
        
        
        }
        else{
          echo '<script>alert("No user found , please try agin")</script>';
        }
        mysqli_close($conn);
        }

        if(isset($_POST['submit5'])){  
          $conn=mysqli_connect('localhost','root','','rental');
          $payment_from=$_POST['payment_from'];
          $payment_to=$_POST['payment_to'];
          if($payment_from>=$payment_to)
           {
             echo '<script>alert("wrong input dates , please try again")</script>';
           }
          $sql="SELECT DISTINCT *
          FROM system_user NATURAL  JOIN reservation NATURAL  JOIN car
          WHERE Payment_Date BETWEEN '$payment_from' AND '$payment_to' ";
          $query=mysqli_query($conn,$sql);
          $result =$conn -> query($sql);
          if($result -> num_rows >0){
          echo "<h2>reports</h1>";
          echo "    <table>
                <tr>
                  <th>user_id</th>
                  <th>email</th>
                  <th>payment_fee</th>
                  <th>payment_date</th>
                  <th>reservation_date</th>
                  <th>pick_date</th>
                  <th>ret_date</th>
                  <th>brand</th>
                  <th>model</th>
                  <th>model_year</th>
                  <th>plate_id</th>
                </tr>";
          
          while ($tuples=mysqli_fetch_array($query))
          {
            echo "<tr><td>".$tuples['user_id']."</td><td>".$tuples['email']."</td><td>".$tuples['fee']."</td><td>".$tuples['Payment_Date']."</td><td>".$tuples['reservation_date']."</td><td>".$tuples['pickup_date']."</td><td>".$tuples['return_date'].
            "</td><td>".$tuples['manefacturing_company']."</td><td>".$tuples['model']."</td><td>".$tuples['model_year']."</td><td>".$tuples['plate_id']."</td></tr>";
          }
          
          
          echo "</table>";
          
          
          }
          mysqli_close($conn);
          }
        

 ?>


  </form>

</div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>

</html>