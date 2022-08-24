<?php
session_start();
$status="Repaired";
$userid=$_SESSION['suserid'];
$conn=mysqli_connect("localhost","root","","project") or die("connection faild");
$sql="select Brand,Model,Imei from mobile where Status='{$status}'";
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
    background-color: burlywood;
    background-size: cover;
                  }
                       th{
                            border: solid 2px red;
                            width: 140px;
                            height: 40px;
                            font-size: 20px;
                            color: blue;
                          
                         }
                        td{
                             border: solid 2px gray;
                            font-size: 20px;
                        }
                        table{
                            text-align: center;
                        width: 600px;
                            margin: auto;
                            border: solid 2px black;
                            border-radius: 10px;
                            background-color: lime;
                         
                        } 
             h1{
                text-align: center;
                color: red;
            }
            a{
                text-decoration: none;
                margin-left: 100px;
            }
            h2{
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <h2><a href="adminfront.php">Home</a></h2>
        <h1>Repaired Mobile</h1>
    <table>
        <tbody>
        <thead>
            <th>Brand</th>
            <th>Model</th>
            <th>Select</th>
            <th>click</th>
            </thead><?php while($rows=mysqli_fetch_assoc($res)){ ?>
            <tr>
            <td><?php echo $rows['Brand']?></td>
            <td><?php echo $rows['Model']?></td>
            <form action=""  method="post">      
             <td><input type="checkbox" name="imei" value="<?php echo $rows['Imei']; 
                 ?>"></td>
                <td><button name="upstatus">CheckOut</button></td>
                </form>
         </tr><?php } ?>
        </tbody>
        </table>
<?php    
   function update()
{ 
       $i=$_POST['imei'];
        $d="Checkout";
       $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
    $sql2="update mobile set Status='{$d}' where Imei='{$i}'";
    if(mysqli_query($conn,$sql2)>0)
    {
        $sql3="update repaireman set jobs=jobs-1 where R_id=(select R_id from repaireman where Imei='{$i}')";
        if(mysqli_query($conn,$sql3)>0)
        {
       
        }
    }
}
if(isset($_POST['upstatus']))
{ 
    update();
    header("Location: checkout.php");
}
?> 
    </body>
</html>    