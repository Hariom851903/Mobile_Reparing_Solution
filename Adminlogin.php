<?php
    session_start();
    $a_userid=$_POST['suser'];
    $a_password=$_POST['spassword'];
     $_SESSION['shop']="";
     $_SESSION['suserid']="";
    $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed"); 
       $sql="select User_id,Password from admin Where User_id='{$a_userid}' AND Password='{$a_password}'";
    $result=mysqli_query($conn,$sql) or die("failed");
    $row=mysqli_num_rows($result);
 $sql1="select Shop_name from admin where User_id='{$a_userid}'";
      $res=mysqli_query($conn,$sql1);
      $r1=mysqli_fetch_assoc($res);
       $_SESSION['shop']= implode(" ",$r1); 
       $_SESSION['suserid']=$a_userid;
    if($row>0)
    {
         header("location: adminfront.php");     
    }
    else
    {
             header("Location: Adminlogin.html");
            echo"unsucessully";
    }
?>