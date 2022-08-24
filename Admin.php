<?php
    $c_fn=$_POST['cn'];
    $c_phone=$_POST['cphone'];
    $c_email=$_POST['cemail'];
    $c_ali=$_POST['Ali'];
    $c_city=$_POST['city'];
    $c_userid=$_POST['userid'];
    $c_password=$_POST['cpassword'];
    $c_pincode=$_POST['Pincode'];
    $c_shop=$_POST['shop'];
    $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed"); 
       $sql="select User_id from admin Where User_id='{$c_userid}'";
    $result=mysqli_query($conn,$sql) or die("failed");

    $row=mysqli_num_rows($result);
    if($row>0){
                
               header("Location: Adminsignup.html");
             }
    else{
         $sql1="insert into admin(Al1,City,Contact_No,Email,Name,Password,Pincode,
         Shop_name,User_id) values('{$c_ali}','{$c_city}','{$c_phone}','{$c_email}','{$c_fn}',
         '{$c_password}','{$c_pincode}','{$c_shop}','{$c_userid}')";
        $result=mysqli_query($conn,$sql1);
        if($result)
        {
             header("Location: Adminlogin.html");
                mysqli_close($conn);
        }
    
        else
            {
            echo "query failed".mysqli_error($conn);
        }
    }

?>