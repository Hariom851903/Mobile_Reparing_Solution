<?php
   session_start();
     $user= $_SESSION['suserid'];
    $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed");
    $sql="Select R_id,Name,C_no,City,Address,DOJ from repaireman where User_id='{$user}'";
    $res=mysqli_query($conn,$sql);
    ?>
<html>
    <head>
        <style>
    body{
             margin: 0;
            padding: 0;
                height: auto;
              font-family: sans-serif;
            background-color: darkorchid;
             background-size: cover;
        }
                    table{  
                            margin:auto; 
                            border: solid 2px green;
                            background-color: cornflowerblue;
                            
                        }
                      th{
                             border: solid 2px red;
                            width: 140px;
                            height: 40px;
                            font-size: 20px;
                            color: white;
                          
                         }
                        td{
                             border: solid 2px blue;
                            font-size: 20px;
                        }
            h1{
                text-align: center;
           }
            li {
                list-style: none;
                float: left;
                padding: 10px;
                border: solid 1px blue;
                background-color: aliceblue;
                
            }
            a{
                background-color: aqua;
                text-decoration: none;
            }
        </style></head>
    <body>
        <h1>Delete/Update For RepaireMan</h1>
        <ul>
        <li><a href="Re-updateDelete.php">Home</a></li>
        <li><a href="adminfront.php">Back</a></li>    
        </ul>
        <table>
            <tbody>
                <thead>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Date Of Joining</th>
                    <th>Select</th>
                    <th>Choose</th>
                </thead>
                <?php  while($rows=mysqli_fetch_assoc($res)){ ?>
                <tr><form action="" method="post">
                <td><?php echo $rows['Name']?></td>
                <td><?php echo $rows['C_no']?></td>
                <td><?php echo $rows['City']?></td>
                <td><?php echo $rows['Address']?></td>
                    <td><?php echo $rows['DOJ']?></td>
                    <?php $_SESSION['R_id']=$rows['R_id'];
                        $up= $_SESSION['R_id'];                                    
                    ?>
                     <td><input type="checkbox" name="rid" value="<?php echo 
                    $up ?>"></td> 
                    <td><a href="updateRepair.php">Edit</a>OR<button name="Delete">Delete</button></td>
                </form></tr>
                
         <?php }?> 
            </tbody>
        </table>
    </body>
</html>
<?php
function Delete(){
     $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed");
     $del=$_POST['rid'];
     $sql1="Delete from repaireman where R_id=$del";
     if(mysqli_query($conn,$sql1))
     {
     }     
 }
if(isset($_POST['Delete']))
{   
    Delete();
    header("Location: Re-UpdateDelete.php");
}
?>