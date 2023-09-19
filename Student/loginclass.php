<?php
include 'connection.php';
class login_users {
      
    function login ($NIC,$Password){
       $con = DBConnect::getConnection();
       
          $sql="SELECT * FROM userinfo where NIC='$NIC' and Password='$Password' and status = 1";
          $result = mysql_query($sql, $con) or die("check_login");
          $user_data = mysql_fetch_array($result);
          $row = mysql_num_rows($result);
            if ($row > 0) {
                if($user_data['usertype'] == 'Admin'){
                    return "Admin";   
                }
                else if($user_data['usertype'] != 'Admin') {
                    return "Student";
                }else {
                    return "Error";
                }   
            }   else {
                    return "Error";
                } 
    }

}

?>
