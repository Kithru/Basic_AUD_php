<?php 
//require_once "classes/connection.php"; 
include 'connection.php';
class Student{
    
    function addstudentdata ($NIC,$Name,$Age,$Address,$Mobile,$Program){ 
        $con = DBConnect::getConnection();
        $query = "INSERT INTO `student` (`nic`,`name`,`age`,`address`,`mobile`,`program`,`added_date`)
                        VALUES ('$NIC','$Name','$Age','$Address','$Mobile','$Program',CURRENT_TIMESTAMP)";
                $result = mysql_query($query, $con) or die(mysql_error($con));
                mysql_close($con);
                  if ($result) {
                    return "Success";
                } else {
                    echo mysql_error();
                }
    }  
    
    function updatestudentdata ($NIC,$Name,$Age,$Address,$Mobile,$Program){ 
        $con = DBConnect::getConnection();
        $sql = "SELECT is_disabled FROM student WHERE nic = '$NIC'"; 
        
        $result = mysql_query($sql, $con) or die($sql . ' ' . mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
        $value = $row["is_disabled"];
            if ($value != 1){
                $query ="UPDATE student SET name='$Name',age='$Age',address='$Address',mobile='$Mobile',program='$Program',updated_date=CURRENT_TIMESTAMP WHERE nic='$NIC' "; 
                $result = mysql_query($query, $con) or die(mysql_error($con));
                          mysql_close($con);
                            if ($result) {   
                              return "Updated";
                          } else {
                              echo mysql_error();
                          }
           }else {
                return "Not_Found";
           }
        }
               
                   $con->close();
  
    }  
    
    function deletestudentdata ($NIC){ 
        $con = DBConnect::getConnection();
      $query=  "UPDATE student SET is_disabled=TRUE ,deleted_date=CURRENT_TIMESTAMP WHERE nic = '$NIC'";
//        $query= "UPDATE student SET deleted_date=CURRENT_TIMESTAMP WHERE nic='$NIC' ";
        $result = mysql_query($query, $con) or die(mysql_error($con));
        mysql_close($con);
          if ($result) {
            return "Delete";
        }
         else {
            echo mysql_error();
         }
    }  
        
}
 

?>
