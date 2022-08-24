<?php
     session_start();
    $c_username=$_POST['suser'];
    $c_password=$_POST['spassword'];
    $_SESSION['success']="";
     $_SESSION['username']="";
    $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed"); 
       $sql="select Username,Password from customer Where Username='{$c_username}' AND Password='{$c_password}'";
    $result=mysqli_query($conn,$sql) or die("failed");
    $row=mysqli_num_rows($result);
    if($row>0):
           $_SESSION['username']=$c_username;
           $_SESSION['success']="login successfull";?>
            <html >
                <head>
                    <style>
                        th{
                            border: solid 2px red;
                            width: 140px;
                            height: 40px;
                            font-size: 20px;
                            color: deeppink;
                          
                         }
                        td{
                             border: solid 2px blue;
                            font-size: 25px;
                        }
                        table{
                            text-align: center;
                            margin: auto;
                            border: solid 4px green;
                            background-color: rgb(0,255,255,0.4);
                         
                        }
                        h1{
                            color: blueviolet;
                            text-align: center;
                       }
                        .last{
                           background-color: white;
                      }
                        a{
                            text-decoration: none;
                            color: red;
                        }
                        body{
                            margin: 0px;
                            padding: 0px;
                            background-image: url("mobile_R.jpg");
                            background-repeat: no-repeat;
                             background-size: cover;
                        }
                    </style>
                </head>
    <body>
        <h1> <?php echo "WELCOME  ".$_SESSION['username']?></h1>
        <?php 
          $sql1="Select Name,Contact_No,Email,Al1,City,Shop_name,User_id from admin where City=(select City from customer where Username='{$c_username}')";
         $results=mysqli_query($conn,$sql1); 
            if(mysqli_num_rows($results)>0){
            
    ?><button><a href="Customer_Imei.php">Track Order</a></button>
         <table cellpadding="10px">
             <tbody>
           <thead >
                <th >Name</th>
                 <th>Phone Number</th>
                 <th>Email</th>
                 <th>Address</th>
                 <th>City</th>
                 <th>Shop Name</th>
            </thead>
             </tbody>
             <?php
             while($rows=mysqli_fetch_assoc($results)){
             ?>
            <tr>
                <td><?php echo $rows['Name']; ?></td>
                <td><?php echo $rows['Contact_No']; ?></td>
                <td><?php echo $rows['Email']; ?></td>
                <td><?php echo $rows['Al1']; ?></td>
                <td><?php echo $rows['City']; ?></td>
                <td><?php echo $rows['Shop_name']; ?></td>
                <td class="last"><form action="userupdate.php" method="post"><input type="checkbox" value="<?php echo $rows['User_id']?>" name="click"/><button>click</button></form>
                    <?php
                 ?>
                    
                </td>
             </tr> 
             <?php } ?>
        </table>
    <?php } ?>
    </body>
                
</html> 
    <?php endif?>
<?php
    if($row==0):?>
        <html><h1>User Not Found</h1><a href="Userlogin.html">Back to login page</a>
    <?php endif ?>
        
       

