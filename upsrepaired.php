<?php
$status="Assigned to";
$dile=0;
$conn=mysqli_connect("localhost","root","","project") or die("connection faild");
$sql="select Brand,Model,Imei from mobile where Status='{$status}' AND delivery=$dile";
$res=mysqli_query($conn,$sql)
?>
<html>
     <head>
        <style>
            body{
    margin: 0;
    padding: 0;
                height: auto;
    font-family: sans-serif;
    background-color: gold;
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
                            background-color: aqua;
                         
                        } 
            h1{
                width: 600px;
                text-align: center;
                color: black;
                background-color: white;
            }
            li{
                
                font-size: 30px;
                list-style: none;
                
            }
            a{color: blue;
                text-decoration: none;}
        </style>
    </head>
    <body>
        <marquee scrollamount="20"><h1>Pending Requests</h1></marquee>
        <ul>
            <li><a href="adminfront.php"><h2>Home</h2></a></li>
        </ul>
       <table>
        <tbody>
        <thead>
            <th>Brand</th>
            <th>Model</th>
            <th>Status</th>
            <th>Select</th>
            <th>Click</th>
            </thead><?php while($rows= mysqli_fetch_assoc($res)){?>
            <tr>
                <td><?php echo $rows['Brand'] ?></td>
                <td><?php echo $rows['Model']?></td>
                <td><?php echo $status ?></td>
                <form action="" method="post"><td><input type="checkbox" name="cimei" value="<?php echo $rows['Imei']?>"></td>
                <td><button name="upstatus" value="Repaired">Repaired</button></td></form>
            </tr><?php }?>
           </tbody>
        </table>
    </body>
</html>
<?php

if(isset($_POST['upstatus']))
{
    $i=$_POST['cimei'];
    $r=$_POST['upstatus'];
    $sql1="update mobile set Status='{$r}' where Imei='{$i}'";
    if(mysqli_query($conn,$sql1))
    {
        header("Location: upsrepaired.php");
    }
}
?>