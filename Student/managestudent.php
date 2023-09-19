<?php 
include 'studentdata.php';
//require "classes/studentdata.php";
$studentmanager = new Student();
$NIC ='';
$Name ='';
$Age ='';
$Address ='';
$Mobile ='';  
$Program ='0';
$status ='';
        
if (isset($_REQUEST['NIC'])) {
    $NIC = $_REQUEST['NIC'];
}

if (isset($_REQUEST['Name'])) {
    $Name = $_REQUEST['Name'];
} 
if (isset($_REQUEST['Age'])) {
    $Age = $_REQUEST['Age'];
}
if (isset($_REQUEST['Address'])) {
    $Address = $_REQUEST['Address'];
}
if (isset($_REQUEST['Mobile'])) {
    $Mobile = $_REQUEST['Mobile'];
}

if (isset($_REQUEST['Program'])) {
    $Program = $_REQUEST['Program'];
}

if (isset($_POST["submit"])) {
  $status = $studentmanager->addstudentdata($NIC,$Name,$Age,$Address,$Mobile,$Program);
}
if (isset($_POST["update"])) {
  $status = $studentmanager->updatestudentdata($NIC,$Name,$Age,$Address,$Mobile,$Program);
}
if (isset($_POST["delete"])) {
  $status = $studentmanager->deletestudentdata($NIC,$Name,$Age,$Address,$Mobile,$Program);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Student details</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
 
   function student_onsubmit() { 
       
        if (document.student.NIC.value == "") {
            window.alert("Please insert NIC number");
            document.student.NIC.focus();
            event.preventDefault();
            return false;
        }
        if (document.student.Name.value == "") {
            window.alert("Please insert a Student Name");
            document.student.Name.focus();
            event.preventDefault();
            return false;
        }
        if (document.student.Age.value == "") {
            window.alert("Please insert age of student");
            document.student.Age.focus();
            event.preventDefault();
            return false;
        }
        if (document.student.Address.value == "") {
            window.alert("Please insert address");
            document.student.Address.focus();
            event.preventDefault();
            return false;
        } 
        if (document.student.Mobile.value == "") {
            window.alert("Please insert mobile number.");
            document.student.Mobile.focus();
            event.preventDefault();
            return false;
        } 
        if (document.student.Program.selectedIndex == 0) {
            window.alert("Please select a program");
            document.student.Program.focus();
            event.preventDefault();
            return false;
        } 
   }
   
    $(document).ready(function () {
       
        var status = $('#status').val();
        if (status == 'Success') {
        alert('Student details added successfully.');
        return false;
         } 
        if (status == 'Updated') {
        alert('Student details updated successfully.');
        return false;
         } 
        if (status == 'Delete') {
        alert('Student details removed successfully.');
        return false;
         }
        if (status == 'Not_Found') {
        alert('Student details do not found, Student details Can not update.');
        return false;
         } 
    });
    
    

</script>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }

    input[type=submit] {
      background-color: #202346;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width:200px;
    }

    input[type=submit]:hover {
      background-color: #FB5C02;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
    
  body {
    background-image: url('source/background.jpg');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-color: #f0f0f0;
  }
   .container {
    background-image: url('source/background.jpg'); 
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
    padding: 20px;
    }
</style>
</head>

<body>
<h3>&nbsp;</h3>
<input type="hidden" name="status" id="status" value="<?php echo $status; ?>">
<form>
<h2 align="center"> Manage Student Details </h2>
</form>
<div class="container">
<form name="student" action="managestudent.php" method="post">
<div align="center">
      <table width="1055" height="222" border="0">
        <tr>
              <th width="114" height="23" scope="row">&nbsp;</th>
              <td width="867">&nbsp;</td>
              <td width="60">&nbsp;</td>
        </tr>
        <tr>
            <th height="81" scope="row">&nbsp;</th>
            <td><p>
            <label for="NIC">Student NIC</label>
            <input type="text" name="NIC" id="NIC" value="" placeholder="Enter NIC Number.." />
          
            <label for="fname"><br />
            Name</label>
            <input type="text" id="Name" name="Name" value="" placeholder="Enter Students' name.."  />
            <label for="age"><br />
            Age</label>
            <input type="text" id="Age" name="Age" value="" placeholder="Enter Students' age.." />
            <label for="age"><br />
            Address</label>
            <input type="text" id="Address" name="Address" value="" placeholder="Enter Student address.." />   
             
            
              Mobile</label>
            <input type="text" name="Mobile" id="Mobile" value="" placeholder="Enter mobile.."  />
             
            <label for="Program"><br />
               Program</label> 
                <select name="Program" id="Program" value="">
                   <option value="0">Please select a Program</option> 
                   <option value="Diploma">Diploma</option> 
                   <option value="HND">HND</option> 
                   <option value="BSC">BSC</option> 

                </select> 
            </p>
            </p>
              
            </p>
            <p></p>
            <p></p>
            <p align="center">
              <input type="submit" value="Submit" name="submit" onclick="student_onsubmit();" />
              <input type="submit" value="Update" name="update" onclick="return Validate()"/>
              <!--<input type="submit" value="Search" name="search" />-->
              <input type="submit" value="Remove" name="delete" />
            </p>
            <h5 align="center">
              
              <a href="viewstudent.php" > View Student list </a> </p>
             
            </h5>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th height="21" scope="row">&nbsp;</th>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>
  </form>
    </div>
</body>
</html>