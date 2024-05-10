<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
  $firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone=$_POST['phoneNo'];
$password = $_POST['password'];
if(!empty(  $firstName)&&!empty(  $lastName)&&!empty(  $password)){
if(!empty($email)){
  $sql="SELECT * from log_in_table where email='$email' ";
  $result= mysqli_query($conn,$sql);
  if($result){
    if($result && mysqli_num_rows($result)>0){
      $user_data=mysqli_fetch_assoc($result);
      if($user_data['email']==$email){
        echo " <script> alert('you have already an account please log in')</script>";
        die;
      }

    }
    else{

$sql = "INSERT  into log_in_table (firstName,lastName,email, password,phoneNo) VALUES ('$firstName', '$lastName','$email','$password','$phoneNo')";

mysqli_query($conn,$sql);
echo " <script> alert('Registered successfully')</script>";
}
{
  echo " <script> alert('PLEASE Enter the valid form !')</script>";
}
}
}
}
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>sign in</title>
  <link rel="stylesheet" href="SIGNin.css">



<style>
    body{
      background-color: black;

    }
    .container{
      width: 600px;
      height: 500px;
      border-style: hidden;
      background-color:#ccc;
      margin-left: 300px;
      margin-top: 100px;
    }
    .signIn_text{
      margin: 80px;
      margin-top: 45px;
      padding-top:70px;
    }
    input{
      width: 300px;
      height: 30px;
    }
    #subm{
      width: 70px;
      height: 30px;
      background-color: black;
      color: white;
      border-radius: 10px;

    }
    #subm:hover{
      cursor: pointer;
    }
  </style>
  <script>
  function validateForm() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var id = document.getElementById("id").value;
    var password = document.getElementById("pass").value;
    var nameRegex = /^[a-zA-Z]+$/;

    if (firstName == "" || lastName == "" || id == "" || password == "") {
      alert("All fields must be filled out");
      return false;
    }
    if(!nameRegex.test(firstName)||!nameRegex.test(lastName)){
      alert("name must be charchter");
      event.preventDefault();
    }

    if (isNaN(id)) {
      alert("ID must be a number");
      return false;
    }

    if (id < 0 || id > 10000) {
      alert("ID must be between 0 and 10000");
      return false;
    }

    

    return true;
  }
</script>
<body>
  <div class="container">
    <div class="signIn_text">

      <form method="POST">
       
        

          <h2>Register</h2>
          <label for="firstName">firstName:</label>
          <input type="text" id="firstName" name="firstName" required><br><br>
          <label for="lastName">lastName:</label>
          <input type="text" id="lastName" name="lastName" required><br><br>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required ><br><br>
          <label for="email">Phone number:</label>
          <input type="tel"id="tel" name="phoneNo"><br><br>
          <label for="passWord">password:</label>
          <input type="password" id="pass" name="password" required >
          <button type="submit"  name="submit" value="SIGN IN" onclick="validateForm()" id="subm">submit</button>
          

          
        


      </form>
    </div>
  </div>
  </div>
  </div>
</body>

</html>