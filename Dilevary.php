
<html>
    <head>
    <style>        
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
                        }</style></head>
    <body>
        <table>
            <thead >
                <th>Name</th>
                <th>Phone Number</th>
                <th>Jobs</th>
                <th>Date of pickup</th>
                <th>Date of Dilevery</th>
                <th>Select</th>
            </thead>
            <?php
            session_start();
            $user=$_SESSION['suserid'];
            $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
            $sql="select Name,Contact_no,jobs,D_id from d_boys where User_id='{$user}'";
            if($res=mysqli_query($conn,$sql)) {  
             ?>
            <tbody><?php while($rows=mysqli_fetch_assoc($res)){?>
                <tr>
                
                <form acton="" method="post">
                 <td><?php echo $rows['Name']; ?></td>
                <td><?php echo $rows['Contact_no']; ?></td>
                <td><?php echo $rows['jobs']; ?></td>
                <td><input type="date" name="sdop"></td>
                <td><input type="date" name="sdod"></td>
                 <td><input type="checkbox" name="did" value="<?php echo $rows['D_id'];?>"></td>
                <td><input type="submit" name="submit-3">
                </form> 
              
                </tr>
                  <?php } ?>
            </tbody>  
            <?php }?>
        </table>
    </body>
<?php
function assigned() 
{
    $Sta="Accept";
    $d_id=$_POST['did'];  
    $imei=$_SESSION['imei'];
    $DOP = $_POST['sdop'];
    $DOD=$_POST['sdod'];
    $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
     $sql=" update mobile set dop='{$DOP}',dod='{$DOD}' where D_id=$d_id AND Status='{$Sta}'";
  if(mysqli_query($conn,$sql))
  {
          $sql2="update mobile set D_id=$d_id where Imei='{$imei}'";
          if(mysqli_query($conn,$sql2))
          {
              header("Location: assignedmoblieR.php");
          }
  }
}
?>
<?php
    if(isset($_POST['submit-3']))
    {
        assigned();
    }
    ?>    
</html>