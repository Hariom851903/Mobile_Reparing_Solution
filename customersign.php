<?php
  session_start();

    $c_fn=$_POST['cfn'];
    $c_ln=$_POST['cln'];
    $c_phone=$_POST['cphone'];
    $c_email=$_POST['cemail'];
    $c_ali=$_POST['Ali'];
    $c_city=$_POST['city'];
    $c_username=$_POST['usernme'];
    $c_password=$_POST['cpassword'];
    $c_pincode=$_POST['Pincode'];
    $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed"); 
       $sql="select Username from customer Where Username='{$c_username}'";
    $result=mysqli_query($conn,$sql) or die("failed");

    $row=mysqli_num_rows($result);
    echo $row;

    if($row>0){
                
               header("Location: customersign.html");
             }
    else{
         $sql1="insert into customer(Ali,City,C_fn,C_ln,C_no,Email,Password,Pincode,Username) values('{$c_ali}','{$c_city}','{$c_fn}','{$c_ln}','{$c_phone}',
         '{$c_email}','{$c_password}','{$c_pincode}','{$c_username}')";
        if(mysqli_query($conn,$sql1))
        {?>
  <script>
   function sign(){  
       alert("SignUp Successfully");       
   } 
  </script> 
     <?php 
             header("Location: Userlogin.html");
                mysqli_close($conn);
        } 
    
        else
        {
            $_SESSION['status']="unSuceessfully sign";
        $_SESSION['status_code']="error";
        }
    }

?>