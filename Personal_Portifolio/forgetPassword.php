<!DOCTYPE html>


<html>
  <head>
    <style>
     
     /* body{
        background-color:black;
color: white;
      }
      .container{
        width: 600px;
        height: 200px;
        border-style: solid;
        background-color: #878f99;
        margin:200px;
      }
      #get{
        color: black;
        margin-left: 50px;
        text-transform: capitalize;
      }
      #sndlink{
        color: white;
        background-color: black;
        border-radius: 15px;
        padding: 5px;

      }
      #sndlink:hover{
        cursor: pointer;
        background-color: gold;
      }
      .textContainer{
        margin-left: 100px;
      }
      #input{
        width: 200px;
        height: 25px;

      }*/
    </style>
  </head>
<body>
  <div class="container" style="">
    <div class="textContainer">
    <form method="POST" action="">
      <p id="get">get your password here!</p>
        <p>Enter  Email:</p>
        <input type="text" name="email" id="input" placeholder="enter your email" style="width: 300px;"><br><br>
        <input type="submit" value="Send Link" id="sndlink" >
        </div>
    </form>
    </div>
</body>
</html>
<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=="POST"){

$email = $_POST['email'];

if(!empty($email)){

  
  $sql=("SELECT * from log_in_table where email='$email'");
  $result= mysqli_query($conn,$sql);
 
  $result = $conn->query($sql);
  
  // Fetch and display data
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
         echo "YOUR PASSWORD is: " . $row["password"]  . "<br>";
        // echo '<span style="color: white;">YOUR PASSWORD: ' . $row["password"] . '</span><br>';
      }
  } else {
      echo "0 results";
  }
}

  $conn->close();
}
  ?>