<?php
    session_start();  
     $user= $_SESSION['suserid'];   
    $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed");
     $sql="Select Name,Contact_no,email,D_id from d_boys where   User_id='{$user}'";
     if($res=mysqli_query($conn,$sql))
     {
         
     }
else{
    echo "unsuccess".mysqli_error($conn);
}
?>
<html>
    <head>
        <style>   
            body{
    margin: 0;
    padding: 0;
                height: auto;
    font-family: sans-serif;
    background-color: limegreen;
    background-size: cover;
                  }
            h1{
                text-align: center;
                color: blue;
            }
                      th{
                            border: solid 2px red;
                            width: 140px;
                            height: 40px;
                            font-size: 20px;
                            color: deeppink;
                          
                         }
                        td{
                             border: solid 2px blue;
                            font-size: 20px;
                        }
                        table{
                            text-align: center;
                            margin: auto;
                            border: solid 2px green;
                            background-color: blue;
                         
                        } 
            a{
                text-decoration:none;
                color: aqua;
            }
           
        </style>
    </head>
    <body>
        <h2><a href="adminfront.php">Home</a></h2>
        <div>
            <h1>Delete/Update For DeliveryBoy</h1>
        <table>
            <tbody>
                <thead>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>email</th>
                    <th>Select</th>
                    <th>Choose</th>
                </thead>
                <?php  while($rows=mysqli_fetch_assoc($res)){ ?>
                <tr><form action="" method="post">
                <td><?php echo $rows['Name']?></td>
                <td><?php echo $rows['Contact_no']?></td>
                <td><?php echo $rows['email']?></td>
            <td><?php $_SESSION['did']=$rows['D_id'];
                      $did= $_SESSION['did']; 
                     ?>
                <input type="checkbox" name="did" value="<?php echo $did;
                     ?>"></td> 
                    <td><a href="updelman.php">Edit</a>OR<button name="Delete">Delete</button></td>
                </form></tr>
         <?php }?> 
            </tbody>
        </table>
        </div>    
<?php
function Delete(){
     $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed");
     $del=$_POST['did'];
     $sql1="Delete from d_boys where D_id=$del";
     if(mysqli_query($conn,$sql1))
     { 
        header("Location: del-updelete.php");
     }     
 }
if(isset($_POST['Delete']))
{   
    Delete();

}
?>
</body>
</html>        