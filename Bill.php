<?php
session_start();
$imei=$_SESSION['imei'];
$user= $_SESSION['suserid'];
$conn=mysqli_connect("localhost","root","","project") or die("connection faild");
$sql="select Username from mobile where Imei='{$imei}'";
$res=mysqli_query($conn,$sql);
$val=mysqli_fetch_assoc($res);
$username=$val['Username'];
$sql1="select Shop_name from admin where User_id='{$user}'";
$res1=mysqli_query($conn,$sql1);
$val1=mysqli_fetch_assoc($res1);
$shop=$val1['Shop_name'];
?> 
<html>
    <style>
        body{
    margin: 0;
    padding: 0;
                height: auto;
    font-family: sans-serif;
    background-color: limegreen;
}
        .Repaire{
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 350px;
    padding: 30px;
    background-color: rgb(0,128,128,0.5); 
    border:solid 3px black;
   border-radius: 50px;
}
        .Repaire h1{
    font-size: 30px;
    margin: 0 0 30px;
    padding: 0;
    color: deeppink;
    text-align: center;
}
.Repaire .inputuser{
    position: relative;
}
 .Repaire .inputuser{
width: 100%;
    padding: 10px 0;
     width: 320px;
     background-color: blue;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
}
        input{
            font-size: 16px;
            height: 30px;
        }
 label{
    position: fixed;
    padding: 10px 0;
    font-size:16px; 
    color: #fff;
    pointer-events: none;
    transition: .5s;
    
}
.Repaire input[type="submit"]
{
    font-size: 15px;
    border: none;
    outline:none;
    color: black;
    background: pink;
    padding: 10px 20px;
    cursor: pointer;
}
    </style>
    <body>
        <ul><li><a href="adminfront.php">Home</a></li></ul>
        <div class="Repaire"><h1>Bill</h1>
        <h1><?php echo $shop ?></h1> 
        <form action="" method="post" >
            <div class="inputuser">
            <input type="text" name="sdilevery"><label>Dilevery_charge</label>
            </div>
            <div class="inputuser">
            <input type="text" name="discount"><label>Discount</label>
            </div>
            <div class="inputuser">
        <input type="text" name="Rcharge"><label>Repair_charge</label>
            </div>
             <div class="inputuser">
        <input type="text" name="Tax"><label>Tax</label> 
            </div>
            <input type="submit"  name="submit-2">
        </form>
        </div>
    </body>
    <?php
    if(isset($_POST['submit-2']))
    {
        
    $userid=$_SESSION['suserid'];   
    $dcharge=$_POST['sdilevery'];
    $dis=$_POST['discount'];
    $rcharge=$_POST['Rcharge'];
    $tax=$_POST['Tax'];
    $date =date ('y-m-d');      
    $sum= ($dcharge+$rcharge+(($tax*$rcharge)/100))-(($dis*$rcharge)/100); 
    $sql2=" insert into bill(Dil_charge,Discount,Repair_charge,Tax,Total,Username,User_id,Date2,Imei) values($dcharge,$dis,$rcharge,$tax,$sum,'{$username}','{$userid}','{$date}','{$imei}')";    
    if(mysqli_query($conn,$sql2))
    {
        header("Location: adminfront.php");
    }
    else
        {
            echo mysqli_error($conn);
        }
    
        
    }
                
    ?>
   
</html>
