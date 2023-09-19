<?php 
include 'loginclass.php';
$login_users = new login_users();
$response = '';

if (@$_POST['submit'] && !empty($_POST['NIC']) && !empty($_POST['Password'])) {
    $response = $login_users->login($_POST['NIC'], $_POST['Password']);
} 

?>

<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
<script>
    
    function login_onsubmit() { 
        if (document.Login.NIC.value == "") {
            window.alert("Please insert NIC number");
            document.Login.NIC.focus();
            event.preventDefault();
            return false;
        }
        if (document.Login.Password.value == "") {
            window.alert("Please insert a password");
            document.Login.Password.focus();
            event.preventDefault();
            return false;
        }
        
   }
    
    
    $(document).ready(function () {
        var status = $('#status').val();
        if (status == 'Admin') {
        alert('Successfully login to the system.');
        window.location.href = "managestudent.php";
        return false;
         } 
        if (status == 'Error') {
        alert('Invalid login, Please try again.');
        return false;
         } 
        
    }); 

</script>
<style>
    body {
    background-image: url('source/background.jpg');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-color: #f0f0f0;
  }
   .container {
    background-image: url('source/background2.png'); 
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
    width: 300px; /* Set the width of the container */
    margin: 150px; /* Center the container horizontally */
    text-align: right; /* Align the form elements to the right */
    padding: 100px; /* Add some padding to the container for better visibility */
    border: 5px solid #ccc; /* Optional: Add a border for the container */
    float: right;
    }
    
</style>
</head>

<body>
<input type="hidden" name="status" id="status" value="<?php echo $response; ?>">
<form name="Login" method="post" action="#" align="right">
<div class="container" style="" align="right">
<h2 align="center">Student Registration system. </h2>
  <p align="center"><br>
    <input type="text" placeholder="Enter Your NIC" name="NIC" id="NIC" >
  </p> <p align="center"> 
    <input type="Password" placeholder="Enter your password" id="myInput" name="Password" > </p>
  <p align="center">
    <input type="checkbox" onclick="myFunction()">
    Show Password  </p>
        <div align="center">
            <input type="submit" name="submit" value="Login" onclick="login_onsubmit();" />
        </div>
        <div align="center" style="margin-top: 15px;">
            <input type="reset" class="cancelbtn" name="submit" value="Cancle" />
        </div>
            
  </div>
</form>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>