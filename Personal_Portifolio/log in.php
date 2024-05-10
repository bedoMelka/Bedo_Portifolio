
<?php
session_start();
include('db.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];

if(!empty(  $firstName)&&!empty(  $password)&&!empty(  $lastName)&&!empty(  $email)){
  $sql="select * from log_in_table where password='$password'";
  $result= mysqli_query($conn,$sql);
  if($result){
    if($result && mysqli_num_rows($result)>0){
      $user_data=mysqli_fetch_assoc($result);
      if($user_data['firstName']==$firstName && $user_data['lastName']==$lastName&&$user_data['email']==$email &&$user_data['password']==$password ){
      
        header("location:wellcome.html");
        die;
      }
      else{
        echo " <script> alert('wrong first name,last name,email or password! ')</script>";
      }
     
    }
  }
  echo " <script> alert('wrong user name or password ! ')</script>";
 
}

}

?>

<!DOCTYPE html>
<html>

<head>
  <title>sign in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
	<link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
		rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="SIGNin.css">
  <style>
    body{ background-color: black;
    }
    
    .container {
      width: 600px;
      height: 400px;
      border-style: hidden;
      margin-left: 200px;
      margin-top: 150px;
      background-color: #878f99;
    }
  
    .signIn_text {
      padding-top: 70px;
      margin-left: 70px;
      margin-top: 40px;
      z-index: 3;
    }
    #result{
      color: red;
    }
    #result1{
      color: red;
    }
    input{
      width: 300px;
      height: 25px;
    }
    input[type="submit"]{
      background-color: #ccc;
      color: black;
      padding: 5px;
      width: 80px;
      border-radius: 30px;
      box-sizing: border-box;
      
    }
    input[type="submit"]:hover{
      cursor: pointer;
      background-color: black;
      color:white;
    }
    #btn{
      border-radius: 10px;
    }
    #login{
      margin-left: 200px;
    }
  </style>
  <script>
    var passWord=document.getElementById('pass').value;
     var firstName = document.getElementById('firstName').value;
     var lastName = document.getElementById('lastName').value;
     var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
    // Validate First Name
    if (firstName === '' || !nameRegex.test(firstName)||lastName===''||!nameRegex.test(lastName) ||isNaN(firstName)||isNaN(lastName)) {
        event.preventDefault();
        
        alert('first name and last name  is required and should contain alphabets');
        return false;
    } else {
        nameError.innerHTML = '';
    }
    //validate passwords
    if(passWord=== ''){
      event.preventDefault();
        
        alert(' your password is required to log in ');
        return false;
    }
    if(email=== ''){
      event.preventDefault();
        
        alert(' your email is required to log in ');
        return false;
    }

  </script>

<script>
    function validateForm() {
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        if (firstName === '') {
            alert('Please enter your First Name');
            return false;
        }

        if (lastName === '') {
            alert('Please enter your Last Name');
            return false;
        }

        if (email === '' || !email.includes('@')) {
            alert('Please enter a valid email address');
            return false;
        }

        if (password === '') {
            alert('Please enter your password');
            return false;
        }

        return true;
    }
</script>
</head>

  
  

<body>
  <div class="container">
    <div class="signIn_text">

      <form  method="POST">
       
        <div id="form" >

          <h4 id="login">LOG IN</h4>
          <label for="firstName">First Name:</label>
          <input type="text" id="firstName" name="firstName" required><br><br>
          <label for="lastName">Last Name:</label>
          <input type="text" id="lastName" name="lastName" required><br><br>
          <label for="email">Email   : </label>
          <input type="email" id="email" name="email" required ><br><br>
          <label for="passWord">Password:</label >
          <input type="password" id="pass" name="password"  required>
         
          <input type="submit" id="btn" value="log In" name="submit" onclick=" validateForm()"><br><br>
          <a href="forgetPassword.php">forget Password?</a>
<h4> Don't have an account ?<a href="sign in.php">sign up here</a></h4-->
          


      </form>
    </div>
  </div>
  </div>
  </div>
</body>

</html>