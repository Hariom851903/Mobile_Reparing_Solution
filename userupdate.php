 <?php
         session_start();
             $res=$_SESSION['username'];
            $userid=$_POST['click'];
           $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed"); 

            $sqli="update customer set User_id='{$userid}' where Username='{$res}'";
            if(mysqli_query($conn,$sqli))
           {              
              header ("Location: customerfront.php");
            
            }
    ?>