<html>
    <head>
    <style>     
        body{
             margin: 0;
            padding: 0;
                height: auto;
              font-family: sans-serif;
            background-image: url("assgined.jpg");
            background-repeat: repeat;
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
                        }</style></head>
    <body>
        <table>
            <thead>
                <th>R_Name</th>
                <th>Phone Number</th>
                <th>Jobs</th>
                <th>Select</th>
            </thead>
            <?php
            session_start();
            $user= $_SESSION['suserid'];
            $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
            $sql="select Name,C_no,jobs,R_id from repaireman where User_id='{$user}'";
            if($res=mysqli_query($conn,$sql))
            { 
             ?>
            <tbody>
                <?php while($rows=mysqli_fetch_assoc($res)){?>
                <tr>
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['C_no'];?></td>
                <td><?php echo $rows['jobs'];?></td>
             <form acton="" method="post"> 
         <td><input type="checkbox" name="rid" value="<?php echo $rows['R_id']; ?>"></td>
                 <td><button name="Assigned" value="Assigned to">Assigned</button></td> 
                </form> 
                </tr>    
                <?php }?>
            </tbody>
            <?php } ?> 
        </table>
    </body>
</html>
<?php 
 if(isset($_POST['Assigned']))
{   
     $status=$_POST['Assigned'];
     $rid=$_POST['rid'];
     $imei=$_SESSION['imei'];
     $sta="Accept";
     $sql1="update mobile set Status='{$status}' where Imei='{$imei}' AND Status='{$sta}'";
     if(mysqli_query($conn,$sql1))
     {
        $sql2="update repaireman set Imei='{$imei}',jobs=jobs+1 where R_id={$rid}";
         if(mysqli_query($conn,$sql2))
         {
              header("Location: Bill.php");                        
         }
     }    
 }
?>